<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
/////////functions for admin
      function getOrderCompleatedBooks(){  // Booktransaction controller for admin
      $sql = "SELECT  op.product_id,opd.name,p.sku,a.enauthorname,a.author_id,o.date_modified,o.payment_country, op.quantity,o.total,op.product_id,os.subscription_type,o.payment_firstname,o.payment_company,o.payment_code,o.currency_code,pu.publisher_id,pu.enpublishername,o.custom_field,p.vitalsource_isbn13,p.vital_source,p.vitalsource_author,p.vitalsource_isbn10,p.vitalsource_edition FROM oc_product p LEFT JOIN oc_product_description opd ON(p.product_id = opd.product_id)LEFT JOIN oc_order_product op ON(op.product_id = opd.product_id)LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_to_author pa ON(pa.product_id = op.product_id)LEFT JOIN oc_author a ON(pa.author_id = a.author_id)LEFT JOIN oc_order_subtype os ON(os.order_id = op.order_id)LEFT JOIN oc_product_to_publisher ptp ON(op.product_id = ptp.product_id)LEFT JOIN oc_publisher pu ON(pu.publisher_id = ptp.publisher_id) WHERE o.order_status_id = 5 AND opd.language_id = 1 ";
      $query = $this->db->query($sql);
       return $query->result_array();
     }
     function getCustomField($custom_field_value_id){
      $sql = "SELECT name FROM oc_custom_field_value_description WHERE custom_field_value_id = '".$custom_field_value_id."' ";
      $query = $this->db->query($sql);
        return $query->result_array();
     }
     

/////////functions for publisher
     function getPublisherOrderCompleatedBooks($publisher_id){
     	 $sql = "SELECT  op.product_id,opd.name,p.sku,a.enauthorname,a.author_id,o.date_modified,o.payment_country, op.quantity,o.total,op.product_id,os.subscription_type,o.payment_firstname,o.payment_company,o.payment_code,o.currency_code,o.custom_field,p.vitalsource_isbn13,p.vital_source,p.vitalsource_author,p.vitalsource_isbn10,p.vitalsource_edition,pu.image AS publisher_logo FROM oc_product p LEFT JOIN oc_product_description opd ON(p.product_id = opd.product_id)LEFT JOIN oc_order_product op ON(op.product_id = opd.product_id)LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_to_author pa ON(pa.product_id = op.product_id)LEFT JOIN oc_author a ON(pa.author_id = a.author_id)LEFT JOIN oc_order_subtype os ON(os.order_id = op.order_id)LEFT JOIN oc_product_to_publisher pp ON(pp.product_id = op.product_id) LEFT JOIN oc_publisher pu ON(pp.publisher_id = pu.publisher_id) WHERE o.order_status_id = 5 AND pp.publisher_id = '".$publisher_id."' AND opd.language_id = 1";
      $query = $this->db->query($sql);
       return $query->result_array();
     }
     function getIsbn10($product_id){  // for admin
        $sql = "SELECT pa.text FROM oc_product_attribute pa LEFT JOIN oc_attribute a ON(a.attribute_id = pa.attribute_id) WHERE language_id = 1 AND product_id = '".$product_id."' AND a.attribute_group_id =7 AND pa.attribute_id = 12  ";
        $query = $this->db->query($sql);

       return $query->result_array();
     }
      function getIsbn13($product_id){  // for admin
        $sql = "SELECT pa.text FROM oc_product_attribute pa LEFT JOIN oc_attribute a ON(a.attribute_id = pa.attribute_id) WHERE language_id = 1 AND product_id = '".$product_id."' AND a.attribute_group_id =7 AND pa.attribute_id = 14  ";
        $query = $this->db->query($sql);

       return $query->result_array();
     }
      function getEbookEdition($product_id){
         $sql = "SELECT pa.text FROM oc_product_attribute pa LEFT JOIN oc_attribute a ON(a.attribute_id = pa.attribute_id) WHERE language_id = 1 AND product_id = '".$product_id."' AND a.attribute_group_id =8 AND pa.attribute_id = 13  ";
        $query = $this->db->query($sql);

       return $query->result_array();
     }
     function getEbookFormat($product_id){
        $sql = "SELECT pa.text FROM oc_product_attribute pa LEFT JOIN oc_attribute a ON(a.attribute_id = pa.attribute_id) WHERE language_id = 1 AND product_id = '".$product_id."' AND a.attribute_group_id =9 AND pa.attribute_id = 15 ";
        $query = $this->db->query($sql);

       return $query->result_array();
     }



     



}    
