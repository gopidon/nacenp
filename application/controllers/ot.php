<?php
class Ot extends CI_Controller
{
    function leaves(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->view('ot/leaves');
        }
    }

    function calendar(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->view('ot/calendar');
        }
    }


    function showAddLeave(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->model('Lookup_model');
            $query = $this->Lookup_model->get_lookup_vals('LEAVE_TYPE');
            $data['leaveTypes']=$query;
            $this->load->view('ot/addleave',$data);
        }
    }


    function addLeave()
    {
        $title =  $this->input->post('title',true) ;
        $leaveType =  $this->input->post('leaveType',true) ;
        $message = $this->input->post('message',true) ;
        $days = $this->input->post('days',true) ;
        $prefix = $this->input->post('prefix',true) ;
        $suffix = $this->input->post('suffix',true) ;
        
        $stationLeave = $this->input->post('stationLeave',true) ;

        $userId = $this->session->userdata("user_id");
        $userBatchId = $this->session->userdata("user_batch_id");

        $this->load->model('Leave_model');
        $leaveId = $this->Leave_model->add_leave($userId,$userBatchId,$days,$prefix,$suffix,$leaveType,$title,$message,$stationLeave);

        $from = $this->input->post('fromDate',true) ;
        $to = $this->input->post('toDate'.$i,true) ;
        for($i=0; $i<sizeof($from); $i++){
                $this->Leave_model->add_leave_item($leaveId,$from[$i],$to[$i]);
        }

        //$this->load->view('ot/leaves');
        /*$this->load->model('Batch_model');
        $query = $this->Batch_model->get_all_batches();
        $data['query']=$query;
        $this->load->view('admin/announcements',$data);*/
    }

    function showUpdateLeave()
    {

        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {

            $id = $this->input->get('id',true);
            log_message("debug","Leave Id:".$id);
            $this->load->model('Lookup_model');
            $query = $this->Lookup_model->get_lookup_vals('LEAVE_TYPE');
            $data['leaveTypes']=$query;
            $this->load->model('Leave_model');
            $leave = $this->Leave_model->get_leave($id);
            $data['leave']=$leave;

            $leaveItems = $this->Leave_model->get_leave_items($id);
            $data['leaveItems']=$leaveItems;
            $this->load->view('ot/updateLeave',$data);
        }


    }

    function updateLeave()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $title =  $this->input->post('title',true) ;
            $leaveType =  $this->input->post('leaveType',true) ;
            $days = $this->input->post('days',true) ;
            $prefix = $this->input->post('prefix',true) ;
            $suffix = $this->input->post('suffix',true) ;
            $message = $this->input->post('message',true) ;
            $noDateRows = $this->input->post('noDateRows',true) ;
            $stationLeave = $this->input->post('stationLeave',true) ;
            $id = $this->input->post('id',true) ;

            $this->load->model('Leave_model');
            $this->Leave_model->update_leave($id,$leaveType,$days, $prefix, $suffix, $title,$message,$stationLeave);

            $this->Leave_model->delete_leave_items($id);

            
            $from = $this->input->post('fromDate',true) ;
            $to = $this->input->post('toDate'.$i,true) ;
            for($i=0; $i<sizeof($from); $i++){
                $this->Leave_model->add_leave_item($id,$from[$i],$to[$i]);
            }
            
        }

    }

    function showViewLeave()
    {

        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {

            $id = $this->input->get('id',true);
            log_message("debug","Leave Id:".$id);
            $this->load->model('Leave_model');
            $leave = $this->Leave_model->get_leave($id);
            $data['leave']=$leave;

            $leaveItems = $this->Leave_model->get_leave_items($id);
            $data['leaveItems']=$leaveItems;
            
            $this->load->view('ot/viewLeave',$data);
        }


    }

    function showOTDetails()
    {

        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $id = $this->session->userdata('user_id');
            $this->load->model('User_model');
            $query = $this->User_model->get_user_details($id);
            $data['userDetails'] = $query;
            $this->load->view('ot/otdetails',$data);
        }


    }



    function fback(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->model('Session_model');
            $query = $this->Session_model->get_sessions_not_voted_by_current_user();
            $data['sessions']=$query;
            $this->load->view('ot/fback',$data);
        }
    }

    function qpapers(){

            $loggedIn = $this->session->userdata('logged_in');
            if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
            {
                $this->load->view('security/notauth');
            }
            else
            {
                 $this->load->view('ot/qpapers');
            }

    }

    function addFB(){
        $sessionId = $this->input->post("sessionId", true);
        $duration = $this->input->post("duration", true);
        $content = $this->input->post("content", true);
        $pres = $this->input->post("pres", true);
        $relevance = $this->input->post("relevance", true);
        $class = $this->input->post("class", true);
        $reading = $this->input->post("reading", true);
        $interactive = $this->input->post("interactive", true);
        $visual = $this->input->post("visual", true);
        $comments = $this->input->post("comments", true);

        $userId = $this->session->userdata('user_id');
        $batchId = $this->session->userdata('user_batch_id');

        $this->load->model('Fb_model');
        $fb_id = $this->Fb_model->add_fb($userId,$batchId,$sessionId,$duration,$content,$pres,$relevance,$class,$reading,$interactive,$visual,$comments);
        $this->load->view('util/fbconfirmation');




    }


    function fetchCalendarEvents(){
        $start = $this->input->get('start', true);
        $end = $this->input->get('end', true);

        $this->load->model('Session_model');
        $sessions = $this->Session_model->get_sessions_between_dates_by_batch($start,$end);

        echo json_encode($sessions);


    }


    function fetchLeavesData(){
        log_message("debug","******* In Fetch Leaves Data ************");

        // Cols to fetch

        $aColumns = array('leave_title','a.lookup_display_val as leave_type', 'b.lookup_display_val as leave_status','leave_id');

        $userId = $this->session->userdata('user_id');


        // DB table to use
        $sTable = 'nacenp_leaves';
        //

        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);





        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false)
            ->from($sTable)
            ->join('NACENP_LOOKUPS as a', 'NACENP_LEAVES.LEAVE_TYPE = a.lookup_val AND a.lookup_code = "LEAVE_TYPE" ')
            ->join('NACENP_LOOKUPS as b', 'NACENP_LEAVES.LEAVE_STATUS = b.lookup_val AND b.lookup_code = "LEAVE_STATUS" ')
            ->where('user_id',$userId);





        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }

        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);

                if($bSortable == 'true')
                {
                    // Substracting 1 to accomodate for S No column
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))-1], $this->db->escape_str($sSortDir));
                }
            }
            //Default Sort Order. Order by session name.
            if($iSortCol==0){
                $this->db->order_by($aColumns[3], 'desc');
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }



        $rResult = $this->db->get();
        log_message("debug",$this->db->last_query());
        //echo($this->db->last_query());

        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length
        $iTotal = $this->db->count_all($sTable);

        //log_message("debug","Here0");

        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        $i=1;
       // echo(json_encode($aColumns));
        foreach($rResult->result_array() as $aRow)
        {

            //log_message("debug","Here1");
            $row = array();
            $row[0] = $i++;
            $j=1;
            foreach($aColumns as $col)
            {
                //log_message("debug","Here2");
                if(!($col=='leave_id' || $col == 'a.lookup_display_val as leave_type' || $col == 'b.lookup_display_val as leave_status'))
                {
                    $row[$j] = $aRow[$col];
                    $j++;
                }

                if($col == 'a.lookup_display_val as leave_type'){
                    $row[$j] = $aRow['leave_type'];
                    $j++;
                }

                if($col == 'b.lookup_display_val as leave_status'){
                    $row[$j] = $aRow['leave_status'];
                    $j++;
                }


            }
            $row[4] = 'K1';
            $row[5] = 'K2';
            $row["DT_RowId"] = $aRow['leave_id'] ;
            array_push($output['aaData'],$row);
        }

        echo json_encode($output);
    }



}
?>