<?php 

class Pref_model extends CI_Model
{




    function update_prefs($userId,$defBatchId)
    {





	    $db_str = 'update nacenp_prefs set def_batch_id = ? where user_id=?';

	    $this->db->query($db_str, array($defBatchId,$userId));







    }




}