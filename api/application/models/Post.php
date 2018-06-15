<?php
class Post extends CI_Model{

function get_posts($num=20,$start=0){
  //$this->db->select()->from('posts')->where('active',1)->order_by('date_added','desc')->limit($num,$start);
  /*$this->db->select('*');
  $this->db->from('posts');
  $this->db->where('active',1);
  $this->db->order_by('date_added','desc');
  $this->db->limit($num,$start);
  $query=$this->db->get();*/
  $this->db->order_by('date_added','desc');
  $query=$this->db->get_where('posts',array('active'=>1),$num,$start);
  return $query->result_array();
}
function get_post_count(){
  $this->db->select('postID')->from('posts')->where('active',1);
  $query=$this->db->get();
  return $query->num_rows();
}
function get_post($postID){
  $this->db->select()->from('posts')->where(array('active'=>1,'postID'=>$postID))->order_by('date_added','desc');
  $query=$this->db->get();
  return $query->first_row('array');
}
function insert_post($data){
  //$data=array(
    //'title'=>'this is a test',
    //'description'=>'this is a description'
  //);
  $this->db->insert('posts',$data);
  return $this->db->insert_id();
}
function update_post($postID,$data){
  $this->db->where('postID',$postID);
  $this->db->update('posts',$data);
}
function delete_post($postID){
  $this->db->where('postID',$postID);
  $this->db->delete('posts');
}
function query(){
  $query=$this->db->query("SELECT*FROM posts WHERE active=1 ORDER BY data_added desc LIMIT $num,$start");
}

}