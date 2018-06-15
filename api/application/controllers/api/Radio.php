<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Radio extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Program');
    }

    public function programs_get()
    {
        
        $program_schedule = $this->Program->getProgramList();
        
        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($program_schedule)
            {
                // Set the response and exit
                $this->response([
                    'status' => true,
                    'message' => 'success',
                    'programs'=>$program_schedule], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Programs not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $program = NULL;

        if (!empty($program_schedule))
        {
            foreach ($program_schedule as $key=> $value)
            {

                if (isset($value['id']) && $value['id'] == $id){
                        $program = $value;
                        
                
                }
                
            }
        }

        if (!empty($program))
        {
            $this->set_response([
                'status' => TRUE,
                'message' => 'success',
                'program'=>$program], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Program could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    
    public function about_get(){
        $about_us = $this->Program->getAboutUs();
        if (!empty($about_us)) {
             $this->set_response([
                'status' => TRUE,
                'message' => 'success',
                'about_us'=>$about_us], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'about us could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    public function scroll_get(){
        $scroll_text = $this->Program->getScrollText();
        if (!empty($scroll_text)) {
             $this->set_response([
                'status' => TRUE,
                'message' => 'success',
                'scroll_text'=>$scroll_text], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'about us could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    public function holymass_get(){

        $holy_mass = $this->Program->getHolymass();
        
        $type = $this->get('type');

        // If the type parameter doesn't exist return all the users

        if ($type === NULL)
        {
            // Check if the holymass store contains holy mass audio (in case the database result returns NULL)
            if ($holy_mass)
            {
                // Set the response and exit
                $this->response([
                    'status' => true,
                    'message' => 'success',
                    'holy_mass'=>$holy_mass], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Holly mass not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record.

       if (empty($type))
        {
            // Invalid type, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

         $holy_mass_audio = NULL;

        if (!empty($holy_mass))
        {
            foreach ($holy_mass as $key=> $value)
            {

                if (isset($value['holymass_rite']) && $value['holymass_rite'] == $type){
                        $holy_mass_audio = $value;
                        
                
                }
                
            }
        }

        if (!empty($holy_mass_audio))
        {
            $this->set_response([
                'status' => TRUE,
                'message' => 'success',
                'holy_mass_audio'=>$holy_mass_audio], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Program could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }


    }
    public function novena_get(){

        // $holy_mass = $this->Program->getHolymass();
        $novena = $this->Program->getNovena();
        
        $type = $this->get('type');

        // If the type parameter doesn't exist return all the users

        if ($type === NULL)
        {
            // Check if the novena store contains novena audio (in case the database result returns NULL)
            if ($novena)
            {
                // Set the response and exit
                $this->response([
                    'status' => true,
                    'message' => 'success',
                    'novena'=>$novena], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Novena not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record.

       if (empty($type))
        {
            // Invalid type, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

         $novena_audio = NULL;

        if (!empty($novena))
        {
            foreach ($novena as $key=> $value)
            {

                if (isset($value['type']) && $value['type'] == $type){
                        $novena_audio = $value;
                        
                
                }
                
            }
        }

        if (!empty($novena_audio))
        {
            $this->set_response([
                'status' => TRUE,
                'message' => 'success',
                'novena_audio'=>$novena_audio], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Program could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }




        // $novena = $this->Program->getNovena();
        // if (!empty($novena)) {
        //      $this->set_response([
        //         'status' => True,
        //         'novena'   => $novena], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        // }else{
        //     $this->set_response([
        //         'status' => FALSE,
        //         'message' => 'novena could not be found'
        //     ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        // }
    }
    

}
