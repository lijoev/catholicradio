<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     function getProgramList()
     {
     	$sql = "SELECT * From  program_schedule";
     	$query = $this->db->query($sql);
     	return $query->result_array();

     }
     function getAboutUs()
     {
          $sql = "SELECT * From about_us";
          $query = $this->db->query($sql);
          return $query->result_array();
     }
     function getScrollText()
     {
          $sql = "SELECT * From scroll_text";
          $query = $this->db->query($sql);
          return $query->result_array();
     }
     function getHolymass(){
          $sql = "SELECT * FROM static_audio";
          $query = $this->db->query($sql);
          return $query->result_array();
     }
     function getNovena(){
          $sql = "SELECT * FROM novena";
          $query = $this->db->query($sql);
          return $query->result_array();
     }
}