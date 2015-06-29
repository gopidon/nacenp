<?php 

class Setup_model extends CI_Model
{


	function insert_user($user_name,$user_display_name, $user_passwd, $user_year, $user_batch)
	{
	   $this->load->library('encrypt');
	   $user_passwd = $this->encrypt->encode($user_passwd);
	   $data = array(
                'user_name' => $user_name,
                'user_display_name' => $user_display_name,
                'user_passwd' => $user_passwd,
                'user_year' => $user_year,
                'user_batch' => $user_batch
                );
           $this->db->insert('nacenp_users', $data);
	}
	
	function insert_function($fn_code,$fn_name)
	{
	   
	   $data = array(
                'function_code' => $fn_code,
                'function_name' => $fn_name
                );
           $this->db->insert('cxdm_fns', $data);
	}
	
	function insert_role($role_code,$role_name)
	{
	   
	   $data = array(
                'role_code' => $role_code,
                'role_name' => $role_name
                );
           $this->db->insert('cxdm_roles', $data);
	}
	
	function query_users()
	{
		$query = $this->db->query('select * from cxdm_users');
		return $query->result();
		
	}
	
	function query_user_role($user_id)
	{
		$query = $this->db->query('select a.role_id, b.role_name from cxdm_user_roles a JOIN cxdm_roles b 
					  where user_id=? and a.role_id = b.role_id', array($user_id));
		return $query->result_array();
	}
	
	function query_roles()
	{
		$query = $this->db->query('select * from cxdm_roles');
		return $query->result();
		
	}
	
	function query_fns()
	{
		$query = $this->db->query('select * from cxdm_fns');
		return $query->result_array();
	}
	
	function query_role_fns($div_id,$role_id)
	{
		$query = $this->db->query('select a.function_id, function_code,function_name from
					  cxdm_role_fns a JOIN cxdm_fns b where div_id=? and role_id=?
					   and a.function_id = b.function_id', array($div_id, $role_id));
		return $query->result_array();
	}
	
	function get_div_name($div_id)
	{
		$query = $this->db->query('select div_name from cxdm_divs where div_id=?', array($div_id));
		return $query->result_array();
	}
	
	
	function validate_user($user_name,$password)
	{
	   $this->load->library('encrypt');
	   $this->load->helper('security');
	   $query = $this->db->query('select user_id,user_name,user_display_name,user_passwd, user_access, user_batch_id from nacenp_users where user_name=?;',array($user_name));
	   if($query->num_rows()>0)
	   {
			foreach ($query->result() as $row)
			{
			   $db_passwd = $row->user_passwd;
			   $db_passwd = $this->encrypt->decode($db_passwd);
				//echo $db_password;
			   $db_passwd = do_hash($db_passwd); // SHA1
			   //$db_password1 = $this->encrypt->sha1($db_password);
			   if($password == $db_passwd)
			   {
				  $this->CreateSession($row->user_id,$row->user_name,$row->user_display_name,$row->user_access, $row->user_batch_id);
				  return true;
			   }
			   else
			   {
			   	//echo $password.':'.$db_password1;
				return false;
			   }
			}
	    }
	    else
	    {
		return false;
	    }
	}
	
	
	
	
	
	
	function get_user_id_by_name($prob_user_name)
	{
		//$this->load->database();
		$query = $this->db->query('select user_id from users where user_name=? LIMIT 1;',array($prob_user_name));
		foreach ($query->result() as $row)
        {
			$user_id =  $row->user_id;
    
        }
		//echo $user_id;
		return $user_id;
	}
	
	
	
	function from_char_code($some_text)
	{
		$output = '';
		$chars = func_get_args();
		foreach($chars as $char){
			$output .= chr((int) $char);
		}
		return $output;
	}
	
	function charCodeAt($str, $i){
		return ord(substr($str, $i, 1));
	}

	
	function decrypt_password($key, $value) {
	  $result='';
	  $p=0;
	  for($i=0;$i<strlen($value);++$i)
	  {
		//$result .= $this->from_char_code($key[$i % strlen($key)] xor $this->charCodeAt($value,$i));
		$p = $i % strlen($key);
		$result .= $this->from_char_code(substr($key,$p,1) ^ $this->charCodeAt($value,$i));
		//$result .=$i;
	  }
	  return $result;
	  //return substr('1234',1,1);
	  
	}
	
	
	function ChangePassword($user_name, $password)
	{
		$this->load->library('encrypt');
	    
		$query = $this->db->query('select user_id,user_name,user_passwd from users where user_name=?;',array($user_name));
		if($query->num_rows()>0)
		{
		    foreach ($query->result() as $row)
			{
				$enc_password = $this->encrypt->encode($password);
				$this->db->query('update users set user_passwd=? where user_id=?;',array($enc_password,$row->user_id));
				return true;
			}
		}
		else
		{
		   return false;
		}
	}
	
	function CreateSession($user_id,$user_name,$user_display_name, $user_access, $user_batch_id)
	{

        $userdata = array(
                    'user_id'  => $user_id,
                    'user_name'     => $user_name,
		            'user_display_name'     => $user_display_name,
                    'user_access' => $user_access,
                    'user_batch_id' => $user_batch_id,
                    'logged_in' => TRUE
                );

		$this->session->set_userdata($userdata);
	}
}
?>