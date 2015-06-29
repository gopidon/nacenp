<?php 

class Fb_model extends CI_Model
{

    function get_all_batches(){
        $db_str = 'select * from nacenp_batches order by batch_id desc';
        $query = $this->db->query($db_str);
        return $query->result();
    }

	function add_fb($userId,$batchId,$sessionId,$duration,$content,$pres,$relevance,$class,$reading,$interactive,$visual,$comments)
    {
        $fb_exists_query = $this->db->query("select 1 from dual where exists (select fb_id from nacenp_fb WHERE user_id=? and session_id=?)", array($userId,$sessionId));
        if(! $fb_exists_query->num_rows()>0){
            $now =  new DateTime();
            $now = $now->format('Y-m-d H:i:s');
            $db_str = 'insert into nacenp_fb (user_id, user_batch_id,session_id, fb_duration, fb_content, fb_pres,fb_relevance, fb_class,
                                          fb_reading, fb_interactive, fb_visual, fb_comments, created_at)
                                               values(?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $this->db->query($db_str,array($userId,$batchId,$sessionId,$duration,$content,$pres,$relevance,$class,
                $reading,$interactive,$visual,$comments, $now));

            return $this->db->insert_id();
        }
        else{
            return -1;
        }


    }

    function get_fb_comments($sessionId, $batchId){
        $db_str = "select user_id,
                          fb_comments 
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();
    }

    function get_fb_defaulters($sessionId, $batchId){
        $db_str = "select user_name,
                          user_display_name 
                    from nacenp_users
                    where user_batch_id = ?
                     and user_id not in (select user_id from nacenp_fb where session_id = ? and user_batch_id = ?)";


        $query = $this->db->query($db_str, array($batchId,$sessionId, $batchId));
        return $query->result();
    }



    function get_fb_duration_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_duration = 'LN' then 1 else 0 end) LongCount,
                        sum(case when fb_duration = 'ST' then 1 else 0 end) ShortCount,
                        sum(case when fb_duration = 'SF' then 1 else 0 end) SufficientCount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }

    function get_fb_content_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_content = 'E' then 1 else 0 end) ECount,
                        sum(case when fb_content = 'V' then 1 else 0 end) VCount,
                        sum(case when fb_content = 'G' then 1 else 0 end) GCount,
                        sum(case when fb_content = 'A' then 1 else 0 end) ACount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }

    function get_fb_pres_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_pres = 'E' then 1 else 0 end) ECount,
                        sum(case when fb_pres = 'V' then 1 else 0 end) VCount,
                        sum(case when fb_pres = 'G' then 1 else 0 end) GCount,
                        sum(case when fb_pres = 'A' then 1 else 0 end) ACount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }

    function get_fb_rel_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_relevance = 'E' then 1 else 0 end) ECount,
                        sum(case when fb_relevance = 'V' then 1 else 0 end) VCount,
                        sum(case when fb_relevance = 'G' then 1 else 0 end) GCount,
                        sum(case when fb_relevance = 'A' then 1 else 0 end) ACount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }

    function get_fb_class_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_class = 'E' then 1 else 0 end) ECount,
                        sum(case when fb_class = 'V' then 1 else 0 end) VCount,
                        sum(case when fb_class = 'G' then 1 else 0 end) GCount,
                        sum(case when fb_class = 'A' then 1 else 0 end) ACount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }

    function get_fb_reading_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_reading = 'E' then 1 else 0 end) ECount,
                        sum(case when fb_reading = 'V' then 1 else 0 end) VCount,
                        sum(case when fb_reading = 'G' then 1 else 0 end) GCount,
                        sum(case when fb_reading = 'A' then 1 else 0 end) ACount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }

    function get_fb_interactive_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_interactive = 'E' then 1 else 0 end) ECount,
                        sum(case when fb_interactive = 'V' then 1 else 0 end) VCount,
                        sum(case when fb_interactive = 'G' then 1 else 0 end) GCount,
                        sum(case when fb_interactive = 'A' then 1 else 0 end) ACount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }


    function get_fb_visual_pie_data($sessionId, $batchId){
        $db_str = "select session_id,
                        user_batch_id,
                        count(*) total,
                        sum(case when fb_visual = 'E' then 1 else 0 end) ECount,
                        sum(case when fb_visual = 'V' then 1 else 0 end) VCount,
                        sum(case when fb_visual = 'G' then 1 else 0 end) GCount,
                        sum(case when fb_visual = 'A' then 1 else 0 end) ACount
                    from nacenp_fb
                    where session_id = ? and user_batch_id = ?
                    group by session_id,user_batch_id";


        $query = $this->db->query($db_str, array($sessionId, $batchId));
        return $query->result();



    }




}