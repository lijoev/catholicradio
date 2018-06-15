<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Aboutus extends CI_Controller {

    function __construct()
        {
		    parent::__construct();
		    $this->load->library('session');
		    $this->load->helper('url');
		    $this->load->helper('html');
		    $this->load->model('Program');
        }
    public function index(){
    	if($this->session->userdata('logged_in')){
    		$data['active'] = 'Aboutus';
    	 	$this->load->view('templates/header');
            $this->load->view('templates/sidebar',$data);
            $this->load->view('aboutus',$data);
        }else{
        	redirect('login','refresh');
        }
    }
    public function editAboutUs(){
    	if($this->session->userdata('logged_in')){
    		$data['active'] = 'Aboutus';
            $aboutus = $this->Program->getAboutUs();
            if (!empty($this->input->post('about'))) {
                $data['aboutus'] = $this->input->post('about');
            }else if (!empty($aboutus[0]['about_us_details'])) {
                $data['aboutus'] = $aboutus[0]['about_us_details'];
            }else{
                $data['aboutus'] = '';

            }
            $aboutus_data = $this->input->post('about');
            if (isset($aboutus_data)) {
                $edit_data = $this->Program->editAboutUs($this->input->post('about'));
                if (!empty($edit_data)) {
                    redirect('Aboutus','refresh');
                }
                
            }
           
    	 	$this->load->view('templates/header');
            $this->load->view('templates/sidebar',$data);
            $this->load->view('editaboutus',$data);
        }else{
        	redirect('login','refresh');
        }
    }
}