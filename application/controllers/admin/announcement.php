<?php
class Announcement extends CI_Controller
{

    function home()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else{
            $this->load->view('home');
        }

    }

    function login()
    {

            $this->load->view('security/login');

    }


    function getAllAnnouncementsByBatch(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $show = $this->input->get('show', true);
            $this->load->model('Announcement_model');
            $announcements = $this->Announcement_model->get_all_announcements_by_current_batch($show);
            echo json_encode($announcements);
        }

    }

    function getAnnouncementsByBatch(){
        $title = $this->input->get('title', true);
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $show = $this->input->get('show', true);
            $this->load->model('Announcement_model');
            $announcements = $this->Announcement_model->get_announcements_by_current_batch($show,$title);
            echo json_encode($announcements);
        }

    }

    function viewAnnouncement()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else{
            $id = $this->input->get('id', true);
            $this->load->model('Announcement_model');
            $announcement = $this->Announcement_model->get_announcement($id);
            $this->load->model('Fileattachment_model');
            $attachments = $this->Fileattachment_model->get_file_attachments($id);
            $data['announcement'] = $announcement;
            $data['attachments'] = $attachments;
            $this->load->view('ot/viewannouncement', $data);
        }

    }


    function announcements(){
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
            $this->load->view('admin/announcements',$data);
        }
    }

    function addAnnouncement()
    {
        $title =  $this->input->post('title',true) ;
        $message = $this->input->post('message',true) ;
        $batchId = $this->input->post('batch',true) ;
        $date = $this->input->post('date',true) ;
        $userId = $this->session->userdata("user_id");

        $this->load->model('Announcement_model');
        $announcementId = $this->Announcement_model->add_announcement($title,$message,$batchId,$date,$userId);
        echo $announcementId;

        /*$this->load->model('Batch_model');
        $query = $this->Batch_model->get_all_batches();
        $data['query']=$query;
        $this->load->view('admin/announcements',$data);*/
    }



    function showAddAnnouncement()
    {
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
            $this->load->view('admin/addAnnouncement',$data);
        }

    }

    function showUpdateAnnouncement()
    {

        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {

            $id = $this->input->get('id',true);
            log_message("debug","Announcement Id:".$id);
            $this->load->model('Batch_model');
            $query = $this->Batch_model->get_all_batches();
            $data['query']=$query;
            $this->load->model('Announcement_model');
            $announcement = $this->Announcement_model->get_announcement($id);
            $data['announcement']=$announcement;
            $this->load->model('Fileattachment_model');
            $attachments = $this->Fileattachment_model->get_file_attachments($id);
            $data['attachments'] = $attachments;
            $this->load->view('admin/updateAnnouncement',$data);
        }


    }

    function updateAnnouncement()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $title =  $this->input->post('title',true) ;
            $message = $this->input->post('message',true) ;
            $batchId = $this->input->post('batch',true) ;
            $date = $this->input->post('date',true) ;
            $id = $this->input->post('id',true) ;
            $userId = $this->session->userdata("user_id");

            $this->load->model('Announcement_model');
            $this->Announcement_model->update_announcement($id,$title,$message,$batchId,$date,$userId);

            /*$this->load->model('Batch_model');
            $query = $this->Batch_model->get_all_batches();
            $data['query']=$query;
            $this->load->view('admin/announcements',$data);*/
        }

    }



    function deleteAnnouncement()
    {
        log_message("debug","Inside delete announcement");
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $id = $this->input->get('id',true);
            $this->load->model('Announcement_model');
            $this->Announcement_model->delete_announcement($id);

            echo $id;
        }
    }

    function fetchAnnouncementData(){
        log_message("debug","******* In Fetch Announcement Data ************");

        $batchId = $this->input->get_post("batchId",true);

        // Cols to fetch

        $aColumns = array('announcement_title','announcement_msg','announcement_batch_id','announcement_date','user_display_name','last_updated_date', 'announcement_id');


        // DB table to use
        $sTable = 'nacenp_announcements';
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
                 ->join('NACENP_USERS', 'NACENP_USERS.USER_ID = NACENP_ANNOUNCEMENTS.LAST_UPDATED_BY')
                 ->where('announcement_batch_id',$batchId);


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
            //Default Sort Order. Order by announcement date desc!
            if($iSortCol==0){
                $this->db->order_by($aColumns[3], 'desc');
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
                if(!($col=='announcement_id'))
                {
                    $row[$j] = $aRow[$col];
                    $j++;
                }

            }
            $row[7] = 'K';
            $row[8] = 'K2';
            $row["DT_RowId"] = $aRow['announcement_id'] ;
            array_push($output['aaData'],$row);
        }

        echo json_encode($output);
    }

    function addAttachments(){
        log_message("debug","In add attachments ...");
        if (!empty($_FILES)) {
            $announcementId = $this->input->post('announcementId', true);
            log_message("debug","Adding attachments for announcementId: ".$announcementId);
            $ds          = DIRECTORY_SEPARATOR;
            $storeFolder = 'writereadfolder'.$ds.'uploads'.$ds.'announcements'.$ds.$announcementId;
            log_message("debug","FCPATH is....".FCPATH);
            $targetPath = FCPATH.$storeFolder;
            $folderExists = file_exists($targetPath);
            log_message("debug",$targetPath." exists?:".$folderExists);
            if (!$folderExists) {
                log_message("debug","Creating new folder@".$targetPath);
                $created = mkdir($targetPath, 0777, true);
                if(!$created){
                    log_message("error","Failed to create folder at ".$targetPath);
                    return "Failed to create dir@".$targetPath;
                }
            }

            log_message("debug","Target Folder:".$targetPath);
            $noFiles = sizeof($_FILES['file']['tmp_name']);
            log_message("debug","Number of attachments: ".$noFiles);
            for($i=0;$i<$noFiles;$i++){
                $tempFile = $_FILES['file']['tmp_name'][$i];
                $targetFile =  $targetPath.$ds.$_FILES['file']['name'][$i];
                $moved = move_uploaded_file($tempFile,$targetFile);
                if($moved){
                    log_message("debug","File moved ... yeah.... proceeding to create filedb entries");
                    $this->load->model('Fileattachment_model');
                    $this->Fileattachment_model->add_file_attachment('ANNOUNCEMENT',$announcementId, $storeFolder, $_FILES['file']['name'][$i]);
                }
                else{
                    log_message("error","Could not move the file ".$tempFile." to ".$targetFile);
                }
            }

        }
        else{
            log_message("error","No files to attach ?????????");
        }

    }


    function removeAttachment(){

        $ds          = DIRECTORY_SEPARATOR;
        $fileId = $this->input->get('fileId', true);

        $this->load->model('Fileattachment_model');
        $attachment = $this->Fileattachment_model->get_file_attachment($fileId);
        foreach($attachment as $row){
            $filePath = FCPATH.$row->file_path.$ds.$row->file_name;
            $fileExists = file_exists($filePath);
            if($fileExists){
                if (!unlink($filePath))
                {
                    log_message("error","Error deleting file");
                    echo -1;
                }
                else
                {
                    log_message("debug","File successfully deleted");
                    $this->Fileattachment_model->delete_file_attachment($fileId);
                }
            }
            else{
                log_message("error","Cannot find the file");
                echo -1;
            }
        }


        echo $fileId;

        /*$fileExists = file_exists($targetFile);
        if($fileExists){
            if (!unlink($targetFile))
            {
                log_message("error","Error deleting file");
                echo ("Error deleting file");
            }
            else
            {
                log_message("debug","File successfully deleted");
                echo ("Deleted file");
            }
        }*/

    }




}
?>