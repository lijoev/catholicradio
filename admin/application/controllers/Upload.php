<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->upload->initialize($config);

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $upload_data = $this->upload->data();

                        // $file_path strstr($upload_data['file_path'], 'uploads');

                        $data_ary = array(
                                'title'     => $upload_data['client_name'],
                                'file'      => $upload_data['file_name'],
                                'width'     => $upload_data['image_width'],
                                'height'    => $upload_data['image_height'],
                                'type'      => $upload_data['image_type'],
                                'size'      => $upload_data['file_size'],
                                'path'      => 'uploads/'.$upload_data['file_name'],
                                'date'      => time(),
                        );

                        $data = array('upload_data' => $upload_data);

                        // $this->load->model('newsModel');


                        var_dump($data_ary);
                        // $ad_ne_data = array(
                        //         'titel' => $this->input->post('ad_news_title') ,
                        //         'content' => $this->input->post('ad_news_content') ,
                        //         'news_category_id' => $this->input->post('ad_news_category') ,
                        //         'img_url' => $data_ary['path']."".$data_ary['file'],
                        //         'created_at' => date("Y-m-d")
                        // );
                        $this->load->view('upload_success', $data);
                }
        }
}
?>