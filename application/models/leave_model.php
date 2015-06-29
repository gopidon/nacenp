<?php 

class Leave_model extends CI_Model
{


	function add_leave($userId,$userBatchId,$days, $prefix, $suffix, $leaveType,$title,$message,$stationLeave)
    {
        $from = date("Y-m-d", strtotime($from));
        $to = date("Y-m-d", strtotime($to));
        $now =  new DateTime();
        $now = $now->format('Y-m-d H:i:s');
        $db_str = 'insert into nacenp_leaves (user_batch_id, user_id, days, prefix, suffix, leave_type,leave_title,leave_message,
                                              station_leave,leave_status, last_updated_date, last_updated_by)
                                               values(?,?,?,?,?,?,?,?,?,?,?,?)';
		    $this->db->query($db_str,array($userBatchId, $userId, $days, $prefix, $suffix, $leaveType, $title, $message, $stationLeave,"P",$now,$userId));
		    $leave_id = $this->db->insert_id();

        

        return $leave_id;  

    }

    function update_leave($id,$leaveType,$days, $prefix, $suffix, $title,$message,$stationLeave)
    {
        
        /*$now =  new DateTime();
        $now = $now->format('Y-m-d H:i:s');*/
        $db_str = 'update nacenp_leaves set leave_type=?, days=?, prefix=?, suffix=?, leave_title=?, leave_message=?, station_leave=? where leave_id=?';
        $this->db->query($db_str,array($leaveType,$days, $prefix, $suffix, $title,$message,$stationLeave,$id));
    }

    function update_leave_status($id, $status, $comments){
        $db_str = 'update nacenp_leaves set leave_status=?, approver_comments=? where leave_id=?';
        $this->db->query($db_str,array($status,$comments,$id));
    }

    function add_leave_item($leaveId, $from, $to){
          $from = date("Y-m-d", strtotime($from));
          $to = date("Y-m-d", strtotime($to));
          $db_str = 'insert into nacenp_leave_items (leave_id, leave_from, leave_to)
                                               values(?,?,?)';
          $this->db->query($db_str,array($leaveId, $from, $to));
          $leave_item_id = $this->db->insert_id();
    }


    function delete_leave_items($leaveId){
        $db_str = 'delete from nacenp_leave_items where leave_id=?';
        $this->db->query($db_str,array($leaveId));
    }

    function get_leave($id){
        $db_str = 'select b.user_display_name, a.days, a.prefix, a.suffix,a.leave_type, a.approver_comments,
                    c.lookup_display_val type, a.leave_title, a.leave_message,a.leave_id,
                   case leave_status
                    when "P" then "Pending Approval"
                    when "A" then "Approved"
                    else "Rejected"
                   end as leaveStatus,
                   case station_leave
                    when "N" then "No"
                    else "Yes"
                   end as stationLeave,
                   case prefix
                    when "N" then "No"
                    else "Yes"
                   end as prefixRead,
                   case suffix
                    when "N" then "No"
                    else "Yes"
                   end as suffixRead,
                   a.station_leave
                   from nacenp_leaves a JOIN nacenp_users b
                   on a.user_id = b.user_id
                   JOIN nacenp_lookups c
                   on a.leave_type = c.lookup_val
                   and leave_id=?';
        $leave = $this->db->query($db_str, array($id));
        return $leave;

        
    }


    function get_leave_items($id){
        $db_str = 'select date_format(leave_from,"%m/%d/%Y") leave_from, date_format(leave_to, "%m/%d/%Y") leave_to from nacenp_leave_items 
                   where leave_id=?';
        $leaveItems = $this->db->query($db_str, array($id));
        return $leaveItems->result();
    }






}