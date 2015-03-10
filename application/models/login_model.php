<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function get_user($studentid, $password)
     {
          $sql = "select * from users where studentid = '$studentid' and password = '$password'";
          $query = $this->db->query($sql);

          if($query->num_rows()==1){
               return $query->result();     
          }
          else{
               echo "ERROR";
          }
     }
}?>