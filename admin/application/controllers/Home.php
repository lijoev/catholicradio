<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

    function __construct()
         {
           parent::__construct();
           $this->load->library('session');
           $this->load->helper('form');
           $this->load->helper('url');
           $this->load->helper('html');
           $this->load->database();
           $this->load->library('form_validation');
           $this->load->model('Program');
           $this->load->model('Dashboard');
         }

    public function index(){
        if($this->session->userdata('logged_in')){
            
            $user = $this->session->userdata('logged_in');
            $data['active'] = 'dashboard';
                  if ($user['logintype'] == "admin") {
                   
                    $this->load->view('templates/header');
                    $this->load->view('templates/sidebar',$data);
                    $this->load->view('index',$data);
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
?>
