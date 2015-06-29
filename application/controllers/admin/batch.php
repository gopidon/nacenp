<?php
class Batch extends CI_Controller
{

    function batches(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->view('admin/batches');
        }
    }

    function addBatch()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $batchName =  $this->input->post('batchName',true) ;
            $batchYear = $this->input->post('batchYear',true) ;
            $batchNum = $this->input->post('batchNum',true) ;
            $batchSize = $this->input->post('batchSize',true) ;


            $this->load->model('Batch_model');
            $batch_id = $this->Batch_model->add_batch($batchName,$batchYear,$batchNum, $batchSize);

            log_message("debug","Created batch:".$batch_id." .Creating multiple users");

            $this->createUsers($batchNum,$batchSize, $batch_id);

            echo $batch_id;
        }

    }

    function createUsers($batchNum, $batchSize, $batchId){
        $userNamePrefix = "nacen".$batchNum."_";
        $this->load->model('User_model');
        $this->load->helper('security');

        for($i=1; $i<=$batchSize; $i++){
            $userName = $userNamePrefix.$i;
            $this->User_model->add_user($userName,$userName,do_hash($userName),"R",$batchId);
        }
    }

    function updateBatch()
    {
        $batch_id = $this->input->post('id',true);
        $value = $this->input->post('value',true) ;
        $column = $this->input->post('columnName',true);

        $this->load->model('Batch_model');
        $this->Batch_model->update_batch($batch_id,$column,$value);

        echo "ok";
    }

    function deleteBatch()
    {
        log_message("info","Inside delete Batch");
        $batch_id = $this->input->get('id',true);
        $this->load->model('Batch_model');
        $this->Batch_model->delete_batch($batch_id);

        echo $batch_id;
    }

    function fetchClassBatchData(){
        log_message("debug","******* In Fetch Batch Data ************");

        // Cols to fetch

        $aColumns = array('batch_name','batch_year','batch_num','batch_size' ,'batch_id');
        $sTable = 'nacenp_batches';

        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);

        log_message("debug","iDisplayStart:".$iDisplayStart);
        log_message("debug","iDisplayLength:".$iDisplayLength);








        /*
         * $this->db->select("SQL_CALC_FOUND_ROWS emp", FALSE)
            ->from('emp')
            ->join('empr', 'empr.b = empr.id', 'left')
            ->like('code', $code)
            ->limit($numrows, $start);
            $q = $this->db->get();
         */

        $this->db
            ->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false)
            ->from($sTable);

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */

        if(isset($sSearch) && !empty($sSearch))
        {
            $this->db->or_like($aColumns[0], $this->db->escape_like_str($sSearch));
        }


        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                log_message("debug",$iSortCol );
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                log_message("debug",$bSortable );
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
                log_message("debug",$sSortDir );

                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))-1], $this->db->escape_str($sSortDir));
                }
            }
            //Default Sort Order. Order by batch name
            if($iSortCol==0){
                $this->db->order_by($aColumns[1], 'desc');
            }



        }

        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }



        $rResult = $this->db->get();
        log_message("debug",$this->db->last_query());

        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length
        $iTotal = $this->db->count_all($sTable);


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
                if(!($col=='batch_id'))
                {
                    $row[$j] = $aRow[$col];
                    $j++;
                }

            }
            $row[5] = 'K';
            $row["DT_RowId"] = $aRow['batch_id'] ;
            array_push($output['aaData'],$row);
        }

        echo json_encode($output);
    }





}
?>