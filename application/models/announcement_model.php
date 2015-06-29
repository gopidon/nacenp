<?php 

class Announcement_model extends CI_Model
{


	function add_announcement($title,$message,$batchId,$date,$userId)
    {
        $date = date("Y-m-d", strtotime($date));
        /*$now =  new DateTime();
        $now = $now->format('Y-m-d H:i:s');*/
        $db_str = 'insert into nacenp_announcements (announcement_title,announcement_msg,announcement_batch_id,announcement_date, last_updated_by)
                                               values(?,?,?,?,?)';
		$this->db->query($db_str,array($title,$message,$batchId,$date,$userId));
		
		return $this->db->insert_id();
    }

    function get_announcement($id){
        $db_str = 'select * from nacenp_announcements where announcement_id=?';
        $announcement = $this->db->query($db_str, array($id));
        return $announcement;
    }

    function delete_announcement($id)
    {
        $db_str = 'delete from nacenp_announcements where announcement_id = ?';
        $this->db->query($db_str,array($id));
    }

    function get_all_announcements_by_current_batch($show){
        $batchId = $this->session->userdata('user_batch_id');
        $db_str = 'select announcement_id, announcement_title, announcement_msg, DATE_FORMAT(announcement_date,"%d %M, %Y") announcement_date, user_display_name
                   from nacenp_announcements a , nacenp_users b where announcement_batch_id = ?
                   and a.last_updated_by = b.user_id order by announcement_date desc '.'LIMIT '.$show;
        $announcements = $this->db->query($db_str, array($batchId));
        $total = $announcements->num_rows();
        $i = $total;
        $load_more = $total == $show;
        $resArr =  $announcements->result();
        $resArr[$i] = array('load-more'=>$load_more);
        return $resArr;
    }

    function get_announcements_by_current_batch($show,$title){
        $batchId = $this->session->userdata('user_batch_id');
        $db_str = 'select announcement_id, announcement_title, announcement_msg, DATE_FORMAT(announcement_date,"%d %M, %Y") announcement_date, user_display_name
                   from nacenp_announcements a , nacenp_users b where announcement_batch_id = ? and announcement_title like ?
                   and a.last_updated_by = b.user_id order by announcement_date desc '.'LIMIT '.$show;
        $announcements = $this->db->query($db_str, array($batchId,"%".$title."%"));
        $total = $announcements->num_rows();
        $i = $total;
        $load_more = $total == $show;
        $resArr =  $announcements->result();
        $resArr[$i] = array('load-more'=>$load_more);
        return $resArr;
    }

    function update_announcement($id,$title,$message,$batchId,$date,$userId)
    {



        $date = date("Y-m-d", strtotime($date));
	    $db_str = 'update nacenp_announcements set announcement_title=?,announcement_msg=?,announcement_batch_id=?,announcement_date=?,last_updated_by=? where announcement_id = ?';
	    $this->db->query($db_str,array($title,$message,$batchId,$date,$userId,$id));
        log_message("debug","*********************Updating announcement:".$this->db->last_query());
	
    }




}