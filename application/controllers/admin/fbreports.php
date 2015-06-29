<?php
class Fbreports extends CI_Controller
{

    function home()
    {
        $this->load->library('nacenutil');
        $this->nacenutil->home();

    }

    function login()
    {

            $this->load->view('security/login');

    }



    function showFbReports()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->load->view('security/notauth');
        }
        else
        {
            $this->load->model('Batch_model');
            $batches = $this->Batch_model->get_all_batches();
            $data['batches']=$batches;
            $this->load->model('Session_model');
            $sessions = $this->Session_model->get_sessions_by_current_batch();
            $data['sessions']=$sessions;
            $this->load->view('admin/fbreports',$data);
        }

    }

    function getFbComments(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $comments = $this->Fb_model->get_fb_comments($sessionId, $batchId);
            echo json_encode($comments);
        }    
    }

    function getFbDefaulters(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $defaulters= $this->Fb_model->get_fb_defaulters($sessionId, $batchId);
            echo json_encode($defaulters);
        }    
    }

    function getFBDurationPieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_duration_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $durArray = array(intval($row->SufficientCount),intval($row->LongCount), intval($row->ShortCount));
                for($i=0;$i<sizeof($durArray);$i++)
                {
                   switch($i){
                       case 0:
                           $label="Sufficient";
                           $color="Green";
                           break;
                       case 1:
                           $label="Longer";
                           $color="Blue";
                           break;
                       case 2:
                           $label="Shorter";
                           $color="Red";
                           break;

                   }

                    $array[]= array('label' => $label,'data' => $durArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }

    function getFBContentPieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_content_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $contentArray = array(intval($row->ECount),intval($row->VCount), intval($row->GCount), intval($row->ACount));
                for($i=0;$i<sizeof($contentArray);$i++)
                {
                    switch($i){
                        case 0:
                            $label="Excellent";
                            $color="Green";
                            break;
                        case 1:
                            $label="Very Good";
                            $color="Blue";
                            break;
                        case 2:
                            $label="Good";
                            $color="Red";
                            break;
                        case 3:
                            $label="Average";
                            $color="Yellow";
                            break;

                    }

                    $array[]= array('label' => $label,'data' => $contentArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }

    function getFBPresPieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_pres_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $contentArray = array(intval($row->ECount),intval($row->VCount), intval($row->GCount), intval($row->ACount));
                for($i=0;$i<sizeof($contentArray);$i++)
                {
                    switch($i){
                        case 0:
                            $label="Excellent";
                            $color="Green";
                            break;
                        case 1:
                            $label="Very Good";
                            $color="Blue";
                            break;
                        case 2:
                            $label="Good";
                            $color="Red";
                            break;
                        case 3:
                            $label="Average";
                            $color="Yellow";
                            break;

                    }

                    $array[]= array('label' => $label,'data' => $contentArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }

    function getFBRelPieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_rel_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $contentArray = array(intval($row->ECount),intval($row->VCount), intval($row->GCount), intval($row->ACount));
                for($i=0;$i<sizeof($contentArray);$i++)
                {
                    switch($i){
                        case 0:
                            $label="Excellent";
                            $color="Green";
                            break;
                        case 1:
                            $label="Very Good";
                            $color="Blue";
                            break;
                        case 2:
                            $label="Good";
                            $color="Red";
                            break;
                        case 3:
                            $label="Average";
                            $color="Yellow";
                            break;

                    }

                    $array[]= array('label' => $label,'data' => $contentArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }

    function getFBClassPieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_class_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $contentArray = array(intval($row->ECount),intval($row->VCount), intval($row->GCount), intval($row->ACount));
                for($i=0;$i<sizeof($contentArray);$i++)
                {
                    switch($i){
                        case 0:
                            $label="Excellent";
                            $color="Green";
                            break;
                        case 1:
                            $label="Very Good";
                            $color="Blue";
                            break;
                        case 2:
                            $label="Good";
                            $color="Red";
                            break;
                        case 3:
                            $label="Average";
                            $color="Yellow";
                            break;

                    }

                    $array[]= array('label' => $label,'data' => $contentArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }

    function getFBInteractivePieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_interactive_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $contentArray = array(intval($row->ECount),intval($row->VCount), intval($row->GCount), intval($row->ACount));
                for($i=0;$i<sizeof($contentArray);$i++)
                {
                    switch($i){
                        case 0:
                            $label="Excellent";
                            $color="Green";
                            break;
                        case 1:
                            $label="Very Good";
                            $color="Blue";
                            break;
                        case 2:
                            $label="Good";
                            $color="Red";
                            break;
                        case 3:
                            $label="Average";
                            $color="Yellow";
                            break;

                    }

                    $array[]= array('label' => $label,'data' => $contentArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }

    function getFBReadingPieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_reading_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $contentArray = array(intval($row->ECount),intval($row->VCount), intval($row->GCount), intval($row->ACount));
                for($i=0;$i<sizeof($contentArray);$i++)
                {
                    switch($i){
                        case 0:
                            $label="Excellent";
                            $color="Green";
                            break;
                        case 1:
                            $label="Very Good";
                            $color="Blue";
                            break;
                        case 2:
                            $label="Good";
                            $color="Red";
                            break;
                        case 3:
                            $label="Average";
                            $color="Yellow";
                            break;

                    }

                    $array[]= array('label' => $label,'data' => $contentArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }

    function getFBVisualPieData(){
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $sessionId = $this->input->get('sessionId', true);
            $batchId = $this->input->get('batchId', true);
            $this->load->model('Fb_model');
            $result = $this->Fb_model->get_fb_visual_pie_data($sessionId, $batchId);
            $array=array();
            foreach($result as $row)
            {
                $contentArray = array(intval($row->ECount),intval($row->VCount), intval($row->GCount), intval($row->ACount));
                for($i=0;$i<sizeof($contentArray);$i++)
                {
                    switch($i){
                        case 0:
                            $label="Excellent";
                            $color="Green";
                            break;
                        case 1:
                            $label="Very Good";
                            $color="Blue";
                            break;
                        case 2:
                            $label="Good";
                            $color="Red";
                            break;
                        case 3:
                            $label="Average";
                            $color="Yellow";
                            break;

                    }

                    $array[]= array('label' => $label,'data' => $contentArray[$i],'color' => $color);


                }
            }
            echo json_encode($array);
        }
    }








}
?>