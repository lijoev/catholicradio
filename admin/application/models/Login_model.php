<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     
     function get_admin($usr,$pwd){
          $sql = "SELECT * FROM admin WHERE user_name = '" . $usr . "' AND password = '" .  $pwd. "'";
          $query = $this->db->query($sql);
               if ($query->num_rows()) {
                    return $query->row_array();

               }else{
                    return false;
               }
          
     }

}?>
