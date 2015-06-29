<?php
class Leaves extends CI_Controller
{

    function showApproveLeaves(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->model('Batch_model');
            $query = $this->Batch_model->get_all_batches();
            $data['batches']=$query;
            $this->load->view('admin/approveLeaves', $data);
        }
    }

    function changeLeaveStatus(){
            $status = $this->input->get('status', true);
            $id = $this->input->get('id', true);
            $comments = $this->input->get('comments', true);
            $this->load->model('Leave_model');
            $this->Leave_model->update_leave_status( $id, $status, $comments);
    }

    function fetchLeavesData(){
        log_message("debug","******* In Fetch Leaves Data ************");

        // Cols to fetch

        $aColumns = array('user_display_name','leave_title','a.lookup_display_val as leave_type','days','b.lookup_display_val as leave_status','leave_id');

        $batchId = $this->input->get_post("batchId",true);


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
            ->join('NACENP_USERS as c', 'NACENP_LEAVES.USER_ID = c.USER_ID ')
            ->join('NACENP_LOOKUPS as a', 'NACENP_LEAVES.LEAVE_TYPE = a.lookup_val AND a.lookup_code = "LEAVE_TYPE" ')
            ->join('NACENP_LOOKUPS as b', 'NACENP_LEAVES.LEAVE_STATUS = b.lookup_val AND b.lookup_code = "LEAVE_STATUS" ')
            ->where('NACENP_LEAVES.user_batch_id',$batchId);





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
                $this->db->order_by($aColumns[5], 'desc');
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
                $j = $i+1; // adding 1 to incorporate SNo
                $bSearchable = $this->input->get_post('bSearchable_'.$j, true);
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
            $row[6] = 'K2';
            $row["DT_RowId"] = $aRow['leave_id'] ;
            array_push($output['aaData'],$row);
        }

        echo json_encode($output);
    }


    





}
?>