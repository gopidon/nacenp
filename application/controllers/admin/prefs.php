<?php
class Prefs extends CI_Controller
{

    function showPrefs(){
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
            $this->load->view('admin/prefs',$data);
        }
    }



    function updatePrefs()
    {
        $loggedIn = $this->session->userdata('logged_in');
        if($loggedIn){
            $userId = $this->session->userdata('user_id');
            $defBatchId = $this->input->post('defBatchId',true);

            $this->load->model('Pref_model');
            $this->Pref_model->update_prefs($userId, $defBatchId);
            $this->session->set_userdata('user_def_batch_id', $defBatchId);

            $this->load->library('nacenutil');
            $isAdmin = $this->nacenutil->isAdmin();
            if($isAdmin){
                $this->load->model('User_model');
                $currentUserId = $this->session->userdata('user_id');
                $this->User_model->update_user($currentUserId, 'user_batch_id',$defBatchId);
                $this->session->set_userdata('user_batch_id', $defBatchId);
            }

        }


    }







}
?>