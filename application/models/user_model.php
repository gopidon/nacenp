<?php 

class User_model extends CI_Model
{
	function add_user($user_name,$user_display_name, $user_passwd, $user_access, $user_batch_id)
    {
        $this->load->library('encrypt');
        $user_passwd = $this->encrypt->encode($user_passwd);
        $data = array(
            'user_name' => $user_name,
            'user_display_name' => $user_display_name,
            'user_passwd' => $user_passwd,
            'user_access' => $user_access,
            'user_batch_id' => $user_batch_id
        );
        $this->db->insert('nacenp_users', $data);
    }

    function update_user($id,$column,$value)
    {
        $db_str = 'update nacenp_users set ' . $column . ' = ? where user_id = ?';
	    $this->db->query($db_str,array($value,$id));
    }

    function update_user_details($id, $batchId, $displayName, $sex, $contact, $econtact, $address, $eaddress){
        $db_str = "update nacenp_users set user_display_name=?, user_sex=?, user_contact=?, user_emergency_contact=?, user_address=?, user_emergency_address=?
                     where user_id=? and user_batch_id=?";
        $this->db->query($db_str,array($displayName, $sex, $contact, $econtact, $address, $eaddress, $id,$batchId));             
    }

    function delete_user($id)
    {
        $db_str = 'delete from nacenp_users where user_id = ?';
		$this->db->query($db_str,array($id));
    }

    function get_user_details($id){
        $query = $this->db->query('select * from nacenp_users where user_id=?', array($id));
        return $query;
    }

    function validate_user($user_name,$password)
    {
        $this->load->library('encrypt');
        $query = $this->db->query('select user_id,user_name,user_display_name,user_passwd, user_access, user_batch_id from nacenp_users where user_name=?;',array($user_name));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $db_passwd = $row->user_passwd;
                $db_passwd = $this->encrypt->decode($db_passwd);
                if($password == $db_passwd)
                {
                    $def_batch_id = -1;
                    $prefs_query = $this->db->query('select def_batch_id from nacenp_prefs where user_id=?;',array($row->user_id));
                    if($prefs_query->num_rows()>0)
                    {
                        foreach ($prefs_query->result() as $prefRow)
                        {
                            $def_batch_id = $prefRow->def_batch_id;
                        }
                    }
                    $this->create_session($row->user_id,$row->user_name,$row->user_display_name,$row->user_access, $row->user_batch_id,$def_batch_id);
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            return false;
        }
    }

    function create_session($user_id,$user_name,$user_display_name, $user_access, $user_batch_id, $def_batch_id)
    {

        $userdata = array(
            'user_id'  => $user_id,
            'user_name'     => $user_name,
            'user_display_name'     => $user_display_name,
            'user_access' => $user_access,
            'user_batch_id' => $user_batch_id,
            'user_def_batch_id' =>  $def_batch_id,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($userdata);
    }

    function change_password($user_name, $old_passwd, $new_passwd)
    {
        log_message("debug","#########In Change Passwd################");
        $this->load->library('encrypt');

        $query = $this->db->query('select user_id,user_name,user_passwd from nacenp_users where user_name=?',array($user_name));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $db_passwd = $row->user_passwd;
                $db_passwd = $this->encrypt->decode($db_passwd);
                if($old_passwd == $db_passwd)
                {
                    $this->db->query('update nacenp_users set user_passwd=? where user_id=?;',array($this->encrypt->encode($new_passwd),$row->user_id));
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        else
        {
            return false;
        }
    }

    function reset_password($user_id)
    {
        log_message("debug","#########In Reset Passwd################");
        $this->load->library('encrypt');
        $this->load->helper('security');
        $query = $this->db->query('select user_id,user_name,user_passwd from nacenp_users where user_id=?',array($user_id));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $db_password = do_hash($row->user_name); // Do SHA1. Since we are getting a clean string here unlike in login form where hashed val is sent across
                $db_password = $this->encrypt->encode($db_password);
                $this->db->query('update nacenp_users set user_passwd=? where user_id=?;',array($db_password,$row->user_id));
                return true;
            }
        }
        else
        {
            return false;
        }
    }

    function user_exists($user_name){
        $query = $this->db->query('select user_id from nacenp_users where user_name=?',array('admin'));
        if($query->num_rows()>0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    function is_admin($user_id){
        $query = $this->db->query('select user_id from nacenp_users where user_id=? and user_access="A"',array($user_id));
        if($query->num_rows()>0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    function fetch_all_users()
    {
        $query = $this->db->query('select * from nacenp_users');
        return $query->result();

    }
}