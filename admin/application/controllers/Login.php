<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{

     public function __construct()
     {
         
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
     }

     public function index()
     {
          
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('maria_login');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    // if ($this->input->post("user_type") == "admin") {
                         $usr_result = $this->login_model->get_admin($username, $password);

                         
                         if ($usr_result) {
                              $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE,
                              //'publisher_id' => $usr_result['publisher_id'],
                              'logintype' => "admin"
                         );
                         //$data['user_result'] = $user_result;
                         $this->session->set_userdata('logged_in' , $sessiondata);

                         redirect('Home/index');
                              
                         }else{
                             $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                              redirect('login/index'); 
                         }

                    // }
                    

                    //check if username and password is correct
                    
                    //var_dump($usr_result);
                    
               }else{
               
                    redirect('login/index');
               }
          }
     }
}