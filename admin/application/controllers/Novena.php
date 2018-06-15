<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Novena extends CI_Controller {

    function __construct()
         {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->model('Program');
          $this->load->model('Search');
         }

    public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['active'] = 'Novena';
              $user = $this->session->userdata('logged_in');
                $novena_audio = array();        
                  $novenaaudios = $this->Program->getNovena();
                  foreach ($novenaaudios as $novenaaudio) {
                       $novena_audio[] = array(
                        'id' => $novenaaudio['id'],
                        'file_name' => $novenaaudio['file_name'],
                        'saint' => $novenaaudio['saint'],
                        'url'      => $novenaaudio['url'],
                      );
                  }   

                  if (!empty($this->input->post())) {
                    $data['selected'] =(array)$this->input->post('selected');
                  }else{
                    $data['selected'] = array();
                  }
                    $data['novena_audios'] = $novena_audio;
                    $this->load->view('templates/header');
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('novena',$data);
        }else{  
            redirect('login', 'refresh');
        }
    }
    public function addNovena(){

      if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['active'] = 'Novena';
            $user = $this->session->userdata('logged_in');
            
            $audio_url = '';
            $data['action'] = base_url().'/index.php/Novena/addNovena';
            $config['upload_path']          = './uploads/novena';
            $config['allowed_types']        = 'gif|jpg|png|m4a|mp4';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

                $this->upload->initialize($config);

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('audio_file'))
                {
                        $upload_data = $this->upload->data();
                        $saint = $this->input->post('saint');
                        switch ($saint) {
                          case '1':
                            $saint_of_day = "St.Anthony";
                            break;
                          case '2':
                            $saint_of_day = "St.Alphonsa";
                            break;
                          case '3':
                            $saint_of_day = "Mother Mary";
                            break;
                          case '4':
                            $saint_of_day = "John Paul II";
                            break;
                          case '5':
                            $saint_of_day = "Chavarayachan";
                            break;
                          case '6':
                            $saint_of_day = "St.Joseph";
                            break;
                          
                        }


                        $novena_data = array(
                            'url' => base_url().'uploads/novena/'.$upload_data['file_name'],
                            'file_name' => $upload_data['file_name'],
                            'saint' => $saint_of_day,
                            'type' => $saint,
                            'created_at' => date("Y-m-d"),
                        );
                        
                        $data_add = $this->Program->addNovena($novena_data);
                        if ($data_add) {

                          $data['success'] = 'Novena added successfully';
                          redirect('Novena', 'refresh');
                        }
                        $this->load->view('templates/header');
                        $this->load->view('templates/sidebar',$data);
                        $this->load->view('novena',$data);
                          
                }else{
                    $this->load->view('templates/header');
                        $this->load->view('templates/sidebar',$data);
                    $this->load->view('novena_add',$data);
                }
                
            }else{  
                redirect('login', 'refresh');
            }
    }
    public function deleteNovena(){
      if($this->session->userdata('logged_in')){
          if (!empty($this->input->post('selected'))) {
            
            foreach ($this->input->post('selected') as $program_id) {
              $this->Program->deleteNovena($program_id);
            }
           redirect('Novena', 'refresh');
          }else{
            redirect('Novena', 'refresh');
          }
          
      
    }else{
      redirect('login', 'refresh');
    }
  }
 
    public function logout(){
      
        $this->session->unset_userdata('logged_in');
        //session_destroy();
        redirect('login', 'refresh');
    }
  }