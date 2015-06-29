<?php 

class Session_model extends CI_Model
{
    function get_sessions_between_dates_by_batch($start, $end){
        $batchId = $this->session->userdata('user_batch_id');
        $db_str = "select session_id as id, session_name as title, session_speaker as speaker, time_format(session_from,'%h:%m %p') as session_from, time_format(session_to,'%h:%m %p') as session_to, concat(session_date,' ',session_from) as start, concat(session_date,' ',session_to) as end from nacenp_class_sessions where session_date between str_to_date(?,'%Y-%m-%d') and str_to_date(?,'%Y-%m-%d')
                    and session_batch_id=?";
        $query = $this->db->query($db_str, array($start,$end,$batchId));
        return $query->result();

    }

    function get_sessions_by_current_batch(){
        $db_str = 'select * from nacenp_class_sessions where session_batch_id = ? order by session_date desc';
        $query = $this->db->query($db_str, array($this->session->userdata('user_batch_id')));
        return $query->result();
    }

    function get_sessions_by_batch($batchId){
        $db_str = 'select session_id, session_name from nacenp_class_sessions where session_batch_id = ? order by session_date desc';
        $query = $this->db->query($db_str, array($batchId));
        return $query->result();
    }

    function get_sessions_not_voted_by_current_user(){
        $batchId = $this->session->userdata('user_batch_id');
        $userId = $this->session->userdata('user_id');
        $db_str = 'select * from nacenp_class_sessions where session_batch_id = ?
                   and session_id not in (select session_id from nacenp_fb where user_id =? and user_batch_id = ?) order by session_date desc';
        $query = $this->db->query($db_str, array($batchId, $userId, $batchId));
        return $query->result();
    }

	function add_session($sessionName,$sessionSpeaker,$sessionDate,$sessionFrom,$sessionTo,$sessionNum, $batchId)
    {
        $sessionDate = date("Y-m-d", strtotime($sessionDate));
        $db_str = 'insert into nacenp_class_sessions (session_name,session_speaker,session_date,session_from, session_to,
                                                        session_num,session_batch_id)
                    values(?,?,?,?,?,?,?)';
		$this->db->query($db_str,array($sessionName,$sessionSpeaker,$sessionDate,$sessionFrom, $sessionTo,$sessionNum,$batchId));
		
		return $this->db->insert_id();
    }

    function update_session($id,$column,$value)
    {

        if($column == 'session_date' && $value !=null && $value!="")
		{
			$value = date("Y-m-d", strtotime($value));
		}
	
	
	
	    $db_str = 'update nacenp_class_sessions set ' . $column . ' = ? where session_id = ?';
	    $this->db->query($db_str,array($value,$id));
	 
	
	
    }

    function delete_session($id)
    {
        $db_str = 'delete from nacenp_class_sessions where session_id = ?';
		$this->db->query($db_str,array($id));
    }
}