<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Programlist extends CI_Controller {

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
            $data['active'] = 'Programlist';
              $user = $this->session->userdata('logged_in');
                $program_list = array();        
                  $allprograms = $this->Program->getAllPrograms();
                  foreach ($allprograms as $program) {
                       $program_list[] = array(
                        'id' => $program['id'],
                        'program_name'      => $program['program_name'],
                        'program_time' => $program['program_time'],
                        'details' => $program['details'],
                      );
                  }   

                  if (!empty($this->input->post())) {
                    $data['selected'] =(array)$this->input->post('selected');
                  }else{
                    $data['selected'] = array();
                  }
                    // $data['add'] =  $this->addProgram();
                    $data['program_lists'] = $program_list;
                    $this->load->view('templates/header');
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('program_list',$data);
        }else{  
            redirect('login', 'refresh');
        }
    }
    public function addProgram(){

      if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['active'] = 'Programlist';
            $user = $this->session->userdata('logged_in');
            $program_name = '';
            $program_time = '';
            $details = '';
              if (!empty($this->input->post())) {
                 $program_data = $this->input->post();
             
                  if (!empty($program_data['program_name'])) {
                      $program_name = $program_data['program_name'];
                  }else{
                    $program_name = '';
                  }
                  if (!empty($program_data['program_time'])) {
                      $program_time = $program_data['program_time'];
                  }else{
                    $program_time = '';
                  }
                  if (!empty($program_data['details'])) {
                    $details = $program_data['details'];
                  }else{
                    $details = '';
                  }  
                  $data_add = $this->Program->addProgram($program_name,$program_time,$details);
                  if ($data_add) {

                    $data['success'] = 'program added successfully';
                    redirect('Programlist', 'refresh');
                  }
              }
                  $data['program_name'] = '';
                  $data['action'] = base_url().'/index.php/Programlist/addProgram';
                  $data['program_time'] = '';
                  $data['details'] = '';
                  $this->load->view('templates/header');
                  $this->load->view('templates/sidebar',$data);
                  $this->load->view('program_list_add',$data);
        }else{  
            redirect('login', 'refresh');
        }
    }
    public function deleteProgram(){
      if($this->session->userdata('logged_in')){
          if (!empty($this->input->post('selected'))) {
            
            foreach ($this->input->post('selected') as $program_id) {
              $this->Program->deleteProgram($program_id);
            }
           redirect('Programlist', 'refresh');
          }else{
            redirect('Programlist', 'refresh');
          }
          
      
    }else{
      redirect('login', 'refresh');
    }
  }
  public function editProgram(){
    if($this->session->userdata('logged_in')){
      $id = $_GET['id'];
       $program_data = $this->Program->getProgramsbyId($id);
       
        
        $data['active'] = 'Programlist';
        if (!empty($this->input->post('program_name'))) {
          $data['program_name'] = $this->input->post('program_name');
        }elseif(!empty($program_data[0]['program_name'])){
          $data['program_name'] = $program_data[0]['program_name'];
        }else{
          $data['program_name'] = '';
        }
        if (!empty($this->input->post('program_time'))) {
          $data['program_time'] = $this->input->post('program_time');
        }elseif(!empty($program_data[0]['program_time'])){
          $data['program_time'] = $program_data[0]['program_time'];
        }else{
          $data['program_time'] = '';
        }
        if (!empty($this->input->post('details'))) {
          $data['details'] = $this->input->post('details');
        }elseif(!empty($program_data[0]['details'])){
          $data['details'] = $program_data[0]['details'];
        }else{
          $data['details'] = '';
        }
          if($this->input->post()){
          $edit_program = $this->Program->editProgram($this->input->post(),$id);
          if ($edit_program) {
            $data['success'] = 'Program edited successfully';
            redirect('Programlist', 'refresh');
          }
          // redirect('Programlist', 'refresh');
          }
          $data['action'] = base_url().'/index.php/Programlist/editProgram?id='.$id.'';
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar',$data);
          $this->load->view('program_list_add',$data);
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