<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     function getQuantityTotal(){   //for admin
     	 $sql = "SELECT SUM(op.quantity)AS quantity,SUM(o.total) AS total FROM oc_order_product op LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product p ON(p.product_id = op.product_id) WHERE o.order_status_id = 5 AND p.vital_source = 0 "; 
        $query = $this->db->query($sql);

       return $query->result_array();      
     }
    function getPublisherQuantity($publisher_id){  // for publisher
		$sql = "SELECT SUM(op.quantity)AS quantity,SUM(o.total) AS total,pu.commission FROM oc_order_product op LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product p ON(p.product_id = op.product_id)LEFT JOIN oc_product_to_publisher opp ON(opp.product_id = op.product_id)LEFT JOIN oc_publisher pu ON(pu.publisher_id = opp.publisher_id) WHERE o.order_status_id = 5 AND p.vital_source = 0 AND opp.publisher_id = '".$publisher_id."' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	
	}
	function getTotalPayment($publisher_id){
		$sql = "SELECT SUM(amount) AS payment FROM oc_publisher_payment WHERE publisher_id = '".$publisher_id."' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
  function getcommission($publisher_id){
    $sql = "SELECT commission FROM oc_publisher WHERE publisher_id = '".$publisher_id."' ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

} 	