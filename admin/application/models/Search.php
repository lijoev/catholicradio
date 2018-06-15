<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     function getSearchedBooks($author_id,$publisher_id){
     	 $sql = "SELECT op.product_id,op.sku,op.isbn,op.image,opd.name,pta.author_id,a.enauthorname,p.enpublishername,p.publisheremail,p.publisherwebsite,op.vital_source,op.vitalsource_author,op.vitalsource_publisher,op.vitalsource_isbn10,op.vitalsource_isbn13,op.vitalsource_edition FROM oc_product op LEFT JOIN oc_product_description opd ON(op.product_id = opd.product_id)LEFT JOIN oc_product_to_author pta ON(opd.product_id = pta.product_id)LEFT JOIN oc_author a ON(pta.author_id = a.author_id)LEFT JOIN oc_product_to_publisher pp ON(op.product_id = pp.product_id)LEFT JOIN oc_publisher p ON(pp.publisher_id = p.publisher_id) WHERE opd.language_id = 1";
      if (!empty($author_id)) {
        $sql .= " AND pta.author_id = '".$author_id."'";
      }
      if (!empty($publisher_id)) {
        $sql .= " AND p.publisher_id = '".$publisher_id."' ";
      }


      $query = $this->db->query($sql);
       return $query->result_array();
     }
     function getSearchedPublisherBooks($author_id,$publisher_id){
       $sql = "SELECT op.product_id,op.sku,op.isbn,op.image,opd.name,pta.author_id,a.enauthorname,p.image AS publisher_logo,op.vital_source,op.vitalsource_edition,op.vitalsource_isbn13,op.vitalsource_isbn10,op.vitalsource_author FROM oc_product op LEFT JOIN oc_product_description opd ON(op.product_id = opd.product_id)LEFT JOIN oc_product_to_author pta ON(opd.product_id = pta.product_id)LEFT JOIN oc_author a ON(pta.author_id = a.author_id)LEFT JOIN oc_product_to_publisher pp ON(op.product_id = pp.product_id)LEFT JOIN oc_publisher p ON(pp.publisher_id = p.publisher_id) WHERE opd.language_id = 1 AND p.publisher_id = '".$publisher_id."' ";
      if (!empty($author_id)) {
        $sql .= " AND pta.author_id = '".$author_id."'";
      }
     
      $query = $this->db->query($sql);
       return $query->result_array();
     }

     function getIsbn10($product_id){

     	 $sql = "SELECT pa.text FROM oc_product_attribute pa LEFT JOIN oc_attribute a ON(a.attribute_id = pa.attribute_id) WHERE language_id = 1 AND product_id = '".$product_id."' AND a.attribute_group_id =7 AND pa.attribute_id = 12 ";
        $query = $this->db->query($sql);
       
       return $query->result_array();
     }
     function getIsbn13($product_id){
     	$sql = "SELECT pa.text FROM oc_product_attribute pa LEFT JOIN oc_attribute a ON(a.attribute_id = pa.attribute_id) WHERE language_id = 1 AND product_id = '".$product_id."' AND a.attribute_group_id =7 AND pa.attribute_id = 14  ";
        $query = $this->db->query($sql);

       return $query->result_array();
     }
     function getEbookEdition($product_id){
     	$sql = "SELECT pa.text FROM oc_product_attribute pa LEFT JOIN oc_attribute a ON(a.attribute_id = pa.attribute_id) WHERE language_id = 1 AND product_id = '".$product_id."' AND a.attribute_group_id =8 AND pa.attribute_id = 13  ";
        $query = $this->db->query($sql);

       return $query->result_array();
     }
     function getParticularBookTransactions($product_id){
      $sql = "SELECT DISTINCT opd.name,a.enauthorname,o.payment_country_id,o.payment_code,o.currency_code,o.date_added,o.date_modified,p.isbn,o.total,os.subscription_type,op.product_id FROM oc_order_product op LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_description opd ON(op.product_id = opd.product_id)LEFT JOIN oc_product p ON(p.product_id = op.product_id)LEFT JOIN oc_product_to_author pta ON(op.product_id = pta.product_id)LEFT JOIN oc_author a ON(pta.author_id = a.author_id)LEFT JOIN oc_order_subtype os ON(os.order_id = op.order_id)WHERE p.vital_source = 0 AND opd.language_id = 1 AND op.product_id = '".$product_id."' AND o.order_status_id = 5";
      $query = $this->db->query($sql);

       return $query->result_array();
     }
     function getTransactionCountryById($id,$keyword){  //for admin
        $sql = "SELECT name,iso_code_3 FROM oc_country WHERE country_id = '".$id."' ";
        $query = $this->db->query($sql);
       
        return $query->result_array();

     }
     function DateSearch($product_id,$startdate,$enddate,$type,$coutry_id,$currency){

            
              
      $sql = "SELECT DISTINCT opd.name,a.enauthorname,o.payment_country_id,o.payment_code,o.currency_code,o.currency_id,o.date_added,o.date_modified,p.isbn,o.total,os.subscription_type,op.product_id,o.payment_firstname,o.payment_company,o.payment_postcode,o.payment_zone,p.sku,pu.publisher_id,pu.enpublishername,pu.publisheremail,pu.publisherwebsite,o.custom_field,pu.image AS publisher_logo,p.vital_source,p.vitalsource_isbn10,p.vitalsource_edition,p.vitalsource_isbn13,p.vitalsource_author FROM oc_order_product op LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_description opd ON(op.product_id = opd.product_id)LEFT JOIN oc_product p ON(p.product_id = op.product_id)LEFT JOIN oc_product_to_author pta ON(op.product_id = pta.product_id)LEFT JOIN oc_author a ON(pta.author_id = a.author_id)LEFT JOIN oc_order_subtype os ON(os.order_id = op.order_id)LEFT JOIN oc_product_to_publisher opp ON(opp.product_id = op.product_id)LEFT JOIN oc_publisher pu ON(opp.publisher_id = pu.publisher_id) WHERE opd.language_id = 1 AND op.product_id = '".$product_id."' AND o.order_status_id = 5";
      if ((!empty($startdate))&&(!empty($enddate))) {
        $sql .=" AND o.date_modified BETWEEN '".$startdate."' AND '".$enddate."' "; 

        
      }
      if (!empty($type)) {
        $sql .=" AND os.subscription_type = '".$type."'";
      }
      if (!empty($coutry_id)) {
        $sql .=" AND o.payment_country_id = '".$coutry_id."' ";
      }
      if (!empty($currency)) {
        $sql .=" AND o.currency_id = '".$currency."' ";
      }
      // var_dump($sql);
      // exit();
      $query = $this->db->query($sql);
      // var_dump($query->result_array());
      // exit();
      return $query->result_array();
     }
     function getOrderCompleatedBooks($author_id,$startdate,$enddate,$publisher_id,$currency_id){  // Booktransaction controller for admin
      $sql = "SELECT  op.product_id,opd.name,p.sku,a.enauthorname,a.author_id,o.date_modified,o.payment_country, op.quantity,o.total,op.product_id,os.subscription_type,o.payment_firstname,o.payment_company,o.payment_code,o.currency_code,pu.publisher_id,pu.enpublishername,o.custom_field,p.vitalsource_isbn13,p.vital_source,p.vitalsource_author,p.vitalsource_isbn10,p.vitalsource_edition FROM oc_product p LEFT JOIN oc_product_description opd ON(p.product_id = opd.product_id)LEFT JOIN oc_order_product op ON(op.product_id = opd.product_id)LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_to_author pa ON(pa.product_id = op.product_id)LEFT JOIN oc_author a ON(pa.author_id = a.author_id)LEFT JOIN oc_order_subtype os ON(os.order_id = op.order_id)LEFT JOIN oc_product_to_publisher pp ON(op.product_id = pp.product_id)LEFT JOIN oc_publisher pu ON(pp.publisher_id = pu.publisher_id) WHERE o.order_status_id = 5 AND opd.language_id = 1 "; 
      
      if (!empty($author_id)) {
        $sql .=" AND a.author_id = '".$author_id."' ";
      }
      if (!empty($startdate)&&!empty($enddate)) {
        $sql .=" AND o.date_modified BETWEEN '".$startdate."' AND '".$enddate."'";
      }
      if (!empty($publisher_id)) {
        $sql .=" AND pu.publisher_id = '".$publisher_id."' " ;
      }
      if (!empty($currency_id)) {
        $sql .=" AND o.currency_id = '".$currency_id."' ";
      }
      $query = $this->db->query($sql);
       return $query->result_array();
     }
     function getPublisherOrderCompleatedBooks($publisher_id,$author_id,$startdate,$enddate,$currency_id){
       $sql = "SELECT  op.product_id,opd.name,p.sku,a.enauthorname,a.author_id,o.date_modified,o.payment_country, op.quantity,o.total,op.product_id,os.subscription_type,o.payment_firstname,o.payment_company,o.payment_code,o.currency_code,o.custom_field,pu.image AS publisher_logo,p.vitalsource_isbn13,p.vital_source,p.vitalsource_author,p.vitalsource_isbn10,p.vitalsource_edition FROM oc_product p LEFT JOIN oc_product_description opd ON(p.product_id = opd.product_id)LEFT JOIN oc_order_product op ON(op.product_id = opd.product_id)LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_to_author pa ON(pa.product_id = op.product_id)LEFT JOIN oc_author a ON(pa.author_id = a.author_id)LEFT JOIN oc_order_subtype os ON(os.order_id = op.order_id)LEFT JOIN oc_product_to_publisher pp ON(pp.product_id = op.product_id) LEFT JOIN oc_publisher pu ON(pp.publisher_id = pu.publisher_id) WHERE o.order_status_id = 5 AND pp.publisher_id = '".$publisher_id."' AND opd.language_id = 1";
      if (!empty($author_id)) {
        $sql .=" AND a.author_id = '".$author_id."' ";
      }
      if (!empty($startdate)&&!empty($enddate)) {
        $sql .=" AND o.date_modified BETWEEN '".$startdate."' AND '".$enddate."'";
      }
      if (!empty($currency_id)) {
        $sql .=" AND o.currency_id = '".$currency_id."' ";
      }
     
      $query = $this->db->query($sql);
      
       return $query->result_array();
     
     }
     function getSearchedOrderCompleatedBooks($author_id,$publisher_id){  // Booktransaction controller for admin
      $sql = "SELECT DISTINCT op.product_id,opd.name,p.sku,a.enauthorname,a.author_id,pu.enpublishername,pu.publisheremail,pu.publisherwebsite,p.vitalsource_isbn10,p.vital_source,p.vitalsource_isbn13,p.vitalsource_author FROM oc_product p LEFT JOIN oc_product_description opd ON(p.product_id = opd.product_id)LEFT JOIN oc_order_product op ON(op.product_id = opd.product_id)LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_to_author pa ON(op.product_id = pa.product_id)LEFT JOIN oc_author a ON(pa.author_id = a.author_id)LEFT JOIN oc_product_to_publisher pp ON(op.product_id = pp.product_id)LEFT JOIN oc_publisher pu ON(pu.publisher_id = pp.publisher_id) WHERE o.order_status_id = 5 AND opd.language_id = 1";
      if (!empty($author_id)) {
        $sql .= " AND a.author_id = '".$author_id."' ";
      }
     
      if (!empty($publisher_id)) {
       $sql .=" AND pu.publisher_id = '".$publisher_id."' ";
     }
     $query = $this->db->query($sql);
       return $query->result_array();
     }
     function getOrderCompleatedPublisherBooks($publisher_id,$author_id){
       $sql = "SELECT DISTINCT op.product_id,opd.name,p.sku,a.enauthorname,a.author_id,pu.image AS publisher_logo,p.vital_source,p.vitalsource_isbn10,p.vitalsource_isbn13,p.vitalsource_author,p.vitalsource_edition FROM oc_product p LEFT JOIN oc_product_description opd ON(p.product_id = opd.product_id)LEFT JOIN oc_order_product op ON(op.product_id = opd.product_id)LEFT JOIN oc_order o ON(o.order_id = op.order_id)LEFT JOIN oc_product_to_publisher opp ON(op.product_id = opp.product_id)LEFT JOIN oc_product_to_author pa ON(op.product_id=pa.product_id)LEFT JOIN oc_author a ON(pa.author_id=a.author_id) LEFT JOIN oc_publisher pu ON(opp.publisher_id = pu.publisher_id) WHERE o.order_status_id = 5 AND opd.language_id = 1  AND opp.publisher_id = '".$publisher_id."' ";
       if (!empty($author_id)) {
         $sql .= " AND a.author_id = '".$author_id."' ";
       }
       // if (!empty($sku)) {
       //   $sql .= " AND p.sku LIKE '%".$sku."%' ";
       // }
      $query = $this->db->query($sql);
       return $query->result_array();
     }
     function getSkus(){
      $sql = "SELECT sku from oc_product WHERE vital_source = 0";
      $query = $this->db->query($sql);
       return $query->result_array();

     }
     function getCountries(){
      $sql = "SELECT name,country_id FROM oc_country";
      $query = $this->db->query($sql);
       return $query->result_array();
     }
     function getCurrencies(){
      $sql = "SELECT currency_id,code FROM oc_currency";
      $query = $this->db->query($sql);
       return $query->result_array();
     }  
     function getPublisherPaymentDetails($publisher_id){
      $sql = "SELECT publisher_id,publisher,transaction_id,check_number,bank_name,amount,date_of_sale,attachments FROM oc_publisher_payment WHERE publisher_id = '".$publisher_id."' ";
      $query = $this->db->query($sql);
      return $query->result_array();
     }

 }
 ?>    