<?php 

class Batch_model extends CI_Model
{

    function get_all_batches(){
        $db_str = 'select * from nacenp_batches order by batch_id desc';
        $query = $this->db->query($db_str);
        return $query->result();
    }

	function add_batch($batchName,$batchYear,$batchNum,$batchSize)
    {
        $db_str = 'insert into nacenp_batches (batch_name,batch_year,batch_num,batch_size)
                                               values(?,?,?,?)';
		$this->db->query($db_str,array($batchName,$batchYear,$batchNum,$batchSize));
		
		return $this->db->insert_id();
    }

    function update_batch($id,$column,$value)
    {

	
	
	
	    $db_str = 'update nacenp_batches set ' . $column . ' = ? where batch_id = ?';
	    $this->db->query($db_str,array($value,$id));
	 
	
	
    }

    function delete_batch($id)
    {
        $db_str = 'delete from nacenp_batches where batch_id = ?';
		$this->db->query($db_str,array($id));
    }


}