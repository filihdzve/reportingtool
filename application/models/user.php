<?php
Class User extends CI_Model
{
 
  function check($data)
  {
    // checks if the email already exists
    $query=$this->db->get_where('USERS',$data);
    $count =$query->num_rows();
    if ($count === 0) {
      //the user can be inserted
      return 1;
    }
    else
      //the user already exists
      return 0;

  }

  function login($data)
  {
    //login query
    $this->db->select('*');
    $this->db->from('USERS');
    $this->db->where($data);
    $this->db->limit(1);
    $query = $this->db->get();
    $user= $query->row();
    //if user exists
   if($query -> num_rows() == 1) {
      //logged in
      return 1;
    }
    else
      //incorrect
      return 0;

  }

  function insert($data) { 
    
    $this->db->insert('USERS',$data);
  
  } 
}
?>