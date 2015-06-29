<?php 

class Fileattachment_model extends CI_Model
{

    function get_file_attachments($fileTypeId){
        $db_str = 'select * from nacenp_file_attachments where file_type_id=?';
        $query = $this->db->query($db_str, array($fileTypeId));
        return $query->result();
    }

    function get_file_attachment($fileId){
        $db_str = 'select * from nacenp_file_attachments where file_id=?';
        $query = $this->db->query($db_str, array($fileId));
        return $query->result();
    }

	function add_file_attachment($type, $typeId,$path,$name)
    {
        $db_str = 'insert into nacenp_file_attachments (file_type,file_type_id,file_path, file_name)
                                               values(?,?,?,?)';
		$this->db->query($db_str,array($type, $typeId,$path,$name));
		
		return $this->db->insert_id();
    }

    function delete_file_attachment($id)
    {
        $db_str = 'delete from nacenp_file_attachments where file_id = ?';
        $this->db->query($db_str,array($id));
    }

    function update_batch($id,$column,$value)
    {

	
	
	
	    $db_str = 'update nacenp_batches set ' . $column . ' = ? where batch_id = ?';
	    $this->db->query($db_str,array($value,$id));
	 
	
	
    }




}