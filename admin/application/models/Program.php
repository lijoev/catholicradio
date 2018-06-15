<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program extends CI_Model
{
    function __construct(){
      // Call the Model constructor
      parent::__construct();
    }

    function getAllPrograms(){    // for Booklist controller for admin
      $sql = "SELECT * FROM program_schedule";
      $query = $this->db->query($sql);
       return $query->result_array();
    }
    function addProgram($program_name,$program_time,$details){
      $sql = "INSERT INTO program_schedule SET program_name = '".$program_name."',program_time = '".$program_time."',details = '".$details."' ";
      $query = $this->db->query($sql);
      if ($query) {
        return true;
      }

    }
    function deleteProgram($id){
      $sql = "DELETE FROM program_schedule WHERE id = '".$id."'";
      $query = $this->db->query($sql);
      // error_log(print_r($query,true), 3, "error.log");
      if($query ){
        return true;
      }
    }
    function getProgramsbyId($id){
      $sql = "SELECT * FROM program_schedule WHERE id = '".$id."'";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
    function editProgram($data,$id){
      $sql = "UPDATE program_schedule SET program_name = '".$data['program_name']."',program_time = '".$data['program_time']."',details = '".$data['details']."' WHERE id = '".$id."' ";
      $query = $this->db->query($sql);
      if ($query) {
        return true;
      }
    }
    function editAboutUs($data){
      $sql = "UPDATE about_us SET about_us_details = '".$data."' ";
      $query = $this->db->query($sql);
      if ($query) {
        return true;
      }
    }
    function getAboutUs(){
      $sql = "SELECT * FROM about_us";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
    function getHomescroll(){
      $sql = "SELECT * FROM  scroll_text";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
    function editHomeScroll($data){
      $sql = "UPDATE scroll_text SET scroll_data = '".$data."' ";
      $query = $this->db->query($sql);
      if ($query) {
        return true;
      }
    }
    function getHolymass(){
      $sql = "SELECT * FROM static_audio";
      $query = $this->db->query($sql);
      if ($query) {
        return $query->result_array();
      }
    }
    function addHolyMass($holy_mass){
      $sql = "INSERT INTO static_audio SET holymass_rite = '".$holy_mass['holymass_rite']."', file_name = '".$holy_mass['file_name']."',  url = '".$holy_mass['url']."', upload_date = '".$holy_mass['created_at']."' ";
      $query = $this->db->query($sql);
      if ($query) {
        return true;
      }
    }
    function deleteHolyMass($id){
      $sql = "DELETE FROM static_audio WHERE id = '".$id."'";
      $query = $this->db->query($sql);
      // error_log(print_r($query,true), 3, "error.log");
      if($query ){
        return true;
      }
    }
    function getHolymassbyId($id){
      $sql = "SELECT * FROM static_audio WHERE id = '".$id."'";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
    function getNovena(){
      $sql = "SELECT * FROM novena";
      $query = $this->db->query($sql);
      if ($query) {
        return $query->result_array();
      }
    }
    function addNovena($novena){
      $sql = "INSERT INTO novena SET file_name = '".$novena['file_name']."',saint = '".$novena['saint']."', type = '".$novena['type']."',  url = '".$novena['url']."', upload_date = '".$novena['created_at']."' ";
      $query = $this->db->query($sql);
      if ($query) {
        return true;
      }
    }
    function deleteNovena($id){
      $sql = "DELETE FROM novena WHERE id = '".$id."'";
      $query = $this->db->query($sql);
      // error_log(print_r($query,true), 3, "error.log");
      if($query ){
        return true;
      }
    }
    function getNovenabyId($id){
      $sql = "SELECT * FROM novena WHERE id = '".$id."'";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
     
}
?>