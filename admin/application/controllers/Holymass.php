<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Holymass extends CI_Controller {

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
            $data['active'] = 'Holymass';
              $user = $this->session->userdata('logged_in');
                $holymass_audio = array();        
                  $holymassaudios = $this->Program->getHolymass();
                  foreach ($holymassaudios as $holymassaudio) {
                       $holymass_audio[] = array(
                        'id' => $holymassaudio['id'],
                        'rite' => $holymassaudio['holymass_rite'],
                        'file_name' => $holymassaudio['file_name'],
                        'url'      => $holymassaudio['url'],
                      );
                  }   

                  if (!empty($this->input->post())) {
                    $data['selected'] =(array)$this->input->post('selected');
                  }else{
                    $data['selected'] = array();
                  }
                    // $data['add'] =  $this->addProgram();
                    $data['holymass_audios'] = $holymass_audio;
                    $this->load->view('templates/header');
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('holymass',$data);
        }else{  
            redirect('login', 'refresh');
        }
    }
    public function addHolymass(){

      if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['active'] = 'Holymass';
            $user = $this->session->userdata('logged_in');
            $holymass_rite = '';
            $audio_url = '';
            $data['program_name'] = '';
            $data['action'] = base_url().'/index.php/Holymass/addHolymass';
            $data['program_time'] = '';
            $config['upload_path']          = './uploads/holymass';
            $config['allowed_types']        = 'gif|jpg|png|m4a|mp4';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

                $this->upload->initialize($config);

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('audio_file'))
                {
                        $upload_data = $this->upload->data();

                        $holy_mass = array(
                            'holymass_rite' => $this->input->post('holymass_rite') ,
                            'url' => base_url().'uploads/holymass/'.$upload_data['file_name'],
                            'file_name' => $upload_data['file_name'],
                            'created_at' => date("Y-m-d"),
                        );
                        $data_add = $this->Program->addHolyMass($holy_mass);
                        if ($data_add) {

                          $data['success'] = 'Holy Mass added successfully';
                          redirect('Holymass', 'refresh');
                        }
                        $this->load->view('templates/header');
                        $this->load->view('templates/sidebar',$data);
                        $this->load->view('holymass',$data);
                          
                }else{
                    $this->load->view('templates/header');
                        $this->load->view('templates/sidebar',$data);
                    $this->load->view('holymass_add',$data);
                }
                
            }else{  
                redirect('login', 'refresh');
            }
    }
    public function deleteHolymass(){
      if($this->session->userdata('logged_in')){
          if (!empty($this->input->post('selected'))) {
            
            foreach ($this->input->post('selected') as $program_id) {
              $this->Program->deleteHolyMass($program_id);
            }
           redirect('Holymass', 'refresh');
          }else{
            redirect('Holymass', 'refresh');
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