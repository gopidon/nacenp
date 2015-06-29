<?php
class User extends CI_Controller
{

    function home()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->login();
        }
        else{
            $this->load->view('home');
        }

    }

    function login()
    {
        $this->load->model('User_model');
        $result = $this->User_model->user_exists('admin');
        if($result){
            $this->load->view('security/login');
        }
        else{
            // seed user
            $this->load->helper('security');
            $this->User_model->add_user('admin','Administrator', do_hash('adminnacen123'), 'A', -1);
            $this->load->view('security/login');
        }

    }

    function users(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->model('Batch_model');
            $query = $this->Batch_model->get_all_batches();
            $data['query']=$query;
            $this->load->view('admin/users',$data);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('security/login');
    }

    function updateUserDetails(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){

            $id = $this->session->userdata('user_id');
            $batchId = $this->session->userdata('user_batch_id');

            $displayName = $this->input->post('displayName', true);
            $sex = $this->input->post('sex', true);
            $contact = $this->input->post('contact', true);
            $econtact = $this->input->post('econtact', true);
            $address = $this->input->post('address', true);
            $eaddress = $this->input->post('eaddress', true);

            $this->load->model('User_model');
            $this->User_model->update_user_details($id,$batchId,$displayName,$sex,$contact,$econtact,$address,$eaddress);

            $this->home();

        }
    }

    function validateUser()
    {
        $userName = $this->input->post('userName', true);
        $password = $this->input->post('password', true);
        $this->load->model('User_model');
        $result = $this->User_model->validate_user($userName,$password);
        if($result)
        {
            $this->home();
        }
        else {
            $this->login();
        }
    }

    function showChangePasswd(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->view('security/chgpwd');
        }
    }

    function changePasswd(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $userName = $this->session->userdata('user_name');
            $old = $this->input->post('oldPasswd', true);
            $new = $this->input->post('newPasswd', true);
            $this->load->model('User_model');
            $result = $this->User_model->change_password($userName, $old,$new);
            if($result)
            {
                $this->home();
            }
            else {
                $this->showChangePasswd();
            }
        }
    }

    function resetPasswd(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $userId = $this->input->get('id',true);
            $this->load->model('User_model');
            $result = $this->User_model->reset_password($userId);
            if($result)
            {
                echo true;
            }
            else {
                echo false;
            }
        }
    }

    function addSingleUser()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $userName =  $this->input->post('userName',true) ;
            $userDisplayName = $this->input->post('userDisplayName',true) ;
            $userAccess = $this->input->post('userAccess',true) ;
            $userBatchId = $this->input->post('userBatch',true) ;
            $this->load->helper('security');
            $userPasswd = do_hash($userName);
            $this->load->model('User_model');
            $this->User_model->add_user($userName,$userDisplayName,$userPasswd, $userAccess, $userBatchId);
        }

    }

    function updateUser()
    {
        $user_id = $this->input->post('id',true);
        $value = $this->input->post('value',true) ;
        $column = $this->input->post('columnName',true);

        $this->load->model('User_model');
        $this->User_model->update_user($user_id,$column,$value);

        echo "ok";
    }



    function deleteUser()
    {
        log_message("debug","Inside delete User");
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else{
            $user_id = $this->input->get('id',true);
            $this->load->model('User_model');
            $this->User_model->delete_user($user_id);

            echo $user_id;
        }
    }

    function fetchUserData(){
        log_message("debug","******* In Fetch User Data ************");

        $batchId = $this->input->get_post("batchId",true);

        log_message("debug", "BatchId:".$batchId);

        // Cols to fetch

        $aColumns = array('user_name','user_display_name','user_access','batch_name', 'user_id');


        // DB table to use
        $sTable = 'nacenp_users';
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
                 ->join('NACENP_BATCHES', 'NACENP_USERS.USER_BATCH_ID = NACENP_BATCHES.BATCH_ID')
                 ->where('user_batch_id',$batchId);


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
                    $this->db->or_like($aColumns[$i], $this->db->escape_str($sSearch));
                }
            }
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
            //Default Sort Order
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
                if(!($col=='user_id'))
                {
                    $row[$j] = $aRow[$col];
                    $j++;
                }

            }
            $row[5] = 'K';
            $row[6] = 'K2';
            $row["DT_RowId"] = $aRow['user_id'] ;
            array_push($output['aaData'],$row);
        }

        echo json_encode($output);
    }




}
?>