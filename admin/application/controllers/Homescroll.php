<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Homescroll extends CI_Controller {

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
            $data['active'] = 'Homescroll';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$data);
            $this->load->view('homescroll',$data);
        }else{
            redirect('login','refresh');
        }
    }
    public function editHomescroll(){
        if($this->session->userdata('logged_in')){
            $data['active'] = 'Homescroll';
            $homescroll = $this->Program->getHomescroll();
            if (!empty($this->input->post('homescroll'))) {
                $data['homescroll'] = $this->input->post('homescroll');
            }else if (!empty($homescroll[0]['scroll_data'])) {
                $data['homescroll'] = $homescroll[0]['scroll_data'];
            }else{
                $data['homescroll'] = '';

            }
            $homescroll_data = $this->input->post('homescroll');
            if (isset($homescroll_data)) {
                $edit_data = $this->Program->editHomeScroll($this->input->post('homescroll'));
                if (!empty($edit_data)) {
                    redirect('Homescroll','refresh');
                }
                
            }
           
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$data);
            $this->load->view('edithomescroll',$data);
        }else{
            redirect('login','refresh');
        }
    }
}