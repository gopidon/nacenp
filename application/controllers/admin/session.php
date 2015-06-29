<?php
class Session extends CI_Controller
{

    function sessions(){
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
            $this->load->view('admin/sessions',$data);
        }
    }

    function addSession()
    {

        $sessionName =  $this->input->post('sessionName',true) ;
        $sessionSpeaker = $this->input->post('sessionSpeaker',true) ;
        $sessionDate = $this->input->post('sessionDate',true) ;
        $sessionFrom = $this->input->post('sessionFrom',true) ;
        $sessionTo = $this->input->post('sessionTo',true) ;
        $batchId = $this->input->post('batchId',true) ;


        $this->load->model('Session_model');
        $session_id = $this->Session_model->add_session($sessionName,$sessionSpeaker,$sessionDate,$sessionFrom,$sessionTo,-1,$batchId);

        echo $session_id;
    }

    function UpdateSession()
    {
        $session_id = $this->input->post('id',true);
        $value = $this->input->post('value',true) ;
        $column = $this->input->post('columnName',true);

        $this->load->model('Session_model');
        $this->Session_model->update_session($session_id,$column,$value);

        echo "ok";
    }

    function deleteSession()
    {
        log_message("info","Inside delete Session");
        $session_id = $this->input->get('id',true);
        log_message("info",$session_id);
        $this->load->model('Session_model');
        $this->Session_model->delete_session($session_id);

        echo $session_id;
    }


    function getSessionsByBatch(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn)
        {
            $batchId = $this->input->get('batchId',true);
            $this->load->model('Session_model');
            $sessions = $this->Session_model->get_sessions_by_batch($batchId);
            echo json_encode($sessions);
        }

    }




    function fetchClassSessionData(){
        log_message("debug","******* In Fetch Class Session Data ************");

        // Cols to fetch

        $aColumns = array('session_name','session_date','session_from','session_to','session_speaker', 'batch_name','session_id');

        $batchId = $this->input->get_post("batchId",true);

        // DB table to use
        $sTable = 'nacenp_class_sessions';
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
            ->join('NACENP_BATCHES', 'NACENP_CLASS_SESSIONS.SESSION_BATCH_ID = NACENP_BATCHES.BATCH_ID')
            ->where('session_batch_id',$batchId);





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
                $this->db->order_by($aColumns[1], 'desc');
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
        foreach($rResult->result_array() as $aRow)
        {
            //log_message("debug","Here1");
            $row = array();
            $row[0] = $i++;
            $j=1;
            foreach($aColumns as $col)
            {
                //log_message("debug","Here2");
                if(!($col=='session_id'))
                {
                    $row[$j] = $aRow[$col];
                    $j++;
                }

            }
            $row[7] = 'K';
            $row["DT_RowId"] = $aRow['session_id'] ;
            array_push($output['aaData'],$row);
        }

        echo json_encode($output);
    }




}
?>