<?php
     
require_once("Rest.inc.php");
error_reporting(E_ALL);     
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class API extends REST {
     
    public $data = "";
    //Enter details of your database
    const DB_SERVER = "localhost";
    const DB_USER = "catholic_my_cath";
    const DB_PASSWORD = "B-BTZMoN8vy4";
    const DB = "catholic_radio";
     
    private $db = NULL;
 
    public function __construct(){
        parent::__construct();              // Init parent contructor
        $this->dbConnect();                 // Initiate Database connection
}
     
public function dbConnect(){
        $this->db = mysqli_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
        if($this->db)
            mysqli_select_db($this->db,self::DB);
}
     
    /*
     * Public method for access api.
     * This method dynmically call the method based on the query string
     *
     */
public function processApi(){
        $func = strtolower(trim(str_replace("/","",$_REQUEST['request'])));
       
        $func = $_REQUEST['request'];
        if((int)method_exists($this,$func) > 0){
            $this->$func();
        }
        else{
            // $this->response('Error code 404, Page not found',404);   // If the method not exist with in this class, response would be "Page not found".
       }
}
private function hello(){
    // echo str_replace("this","that","HELLO WORLD!!");
    if($this->get_request_method() != "GET"){
        $this->response('',406);
    }
    // echo str_replace("this","that","HELLO WORLD!!");
    //$myDatabase= $this->db;// variable to access your database
    // $param ="hai";
    echo str_replace("this","that","HELLO WORLD!!");
    // $param=$this->_request['var'];
    // // If success everythig is good send header as "OK" return param
    // $this->response($param, 200); 
 
}
     
 
private function getProgramList(){    
    // Cross validation if the request method is GET else it will return "Not Acceptable" status
    if($this->get_request_method() != "GET"){
        $this->response('',406);
    }
       $qry = "SELECT id, program_name, program_time , details FROM program_schedule";
        $sql = mysqli_query($this->db,$qry);
                   if($sql->num_rows > 0){

                        $result['program_list'] = mysqli_fetch_all($sql,MYSQLI_ASSOC); 
                        $programs = array(
                            'programs' => $result['program_list'], 
                            'status' => 'true', 
                            'message' => 'success', 
                        );
                      $this->response($this->json($programs), 200);
                        
                    }else{

                        $error['error'][] = array(
                            'error' => 'true',
                            'code' => 'no_result',
                        );
                        $result = array(
                            'error' => $error['error'], 
                            'status' => 'false', 
                            'message' => 'no result', 
                        );
                        $this->response($this->json($result), 207);
                    }
                   
}
private function getProgramById(){
    if($this->get_request_method() != "GET"){
        $this->response('',406);
    }
    $id = $_GET['id'];
     $qry = "SELECT * FROM program_schedule WHERE id = '".$id."' ";
        $sql = mysqli_query($this->db,$qry);
                   if($sql->num_rows > 0){
                        $result['program_list'] = mysqli_fetch_all($sql,MYSQLI_ASSOC); 
                        $programs = array(
                            'programs' => $result['program_list'], 
                            'status' => 'true', 
                            'message' => 'success', 
                        );
                      $this->response($this->json($programs), 200);
                    }else{
                        $error['error'][] = array(
                            'error' => 'true',
                            'code' => 'no_result',
                        );
                        $result = array(
                            'error' => $error['error'], 
                            'status' => 'false', 
                            'message' => 'no result', 
                        );
                        $this->response($this->json($result), 207);
                    }
}
private function getAboutUs(){
    if($this->get_request_method() != "GET"){
        $this->response('',406);
    }
    $qry = "SELECT * FROM about_us";
    $sql = mysqli_query($this->db,$qry);
    if($sql->num_rows > 0){
                        $result['about_us'] = mysqli_fetch_all($sql,MYSQLI_ASSOC); 
                        $about_us = array(
                            'about_us' => $result['about_us'], 
                            'status' => 'true', 
                            'message' => 'success', 
                        );
                      $this->response($this->json($about_us), 200);
                    }else{
                        $error['error'][] = array(
                            'error' => 'true',
                            'code' => 'no_result',
                        );
                        $result = array(
                            'error' => $error['error'], 
                            'status' => 'false', 
                            'message' => 'no result', 
                        );
                        $this->response($this->json($result), 207);
                    }
}
private function getHomescroll(){
    if($this->get_request_method() != "GET"){
        $this->response('',406);
    }
    $qry = "SELECT * FROM scroll_text";
    $sql = mysqli_query($this->db,$qry);
    if($sql->num_rows > 0){
                        $result['scroll_text'] = mysqli_fetch_all($sql,MYSQLI_ASSOC); 
                        $scroll_data = array(
                            'scroll_text' => $result['scroll_text'], 
                            'status' => 'true', 
                            'message' => 'success', 
                        );
                      $this->response($this->json($scroll_data), 200);
                    }else{
                        $error['error'][] = array(
                            'error' => 'true',
                            'code' => 'no_result',
                        );
                        $result = array(
                            'error' => $error['error'], 
                            'status' => 'false', 
                            'message' => 'no result', 
                        );
                        $this->response($this->json($result), 207);
                    }
}
 
     
    /*
     *  Encode array into JSON
    */
    private function json($data){
        if(is_array($data)){
            return json_encode($data);
        }
    }
}
 
    // Initiiate Library
     
    $api = new API;
    $api->processApi();
?>