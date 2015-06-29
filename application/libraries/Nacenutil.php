<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Nacenutil
{
    /**
     * Global container variables for chained argument results
     *
     */
    private $ci;


    /**
     * Copies an instance of CI
     */
    public function __construct()
    {
        $this->ci =& get_instance();
    }

    /**
     * Utility function that takes you home! Called from multiple controllers.
     */

    function home()
    {
        $loggedIn = $this->ci->session->userdata('logged_in');
        if($loggedIn==null || $loggedIn==FALSE || $loggedIn=='')
        {
            $this->ci->load->view('security/notauth');
        }
        else{
            $this->ci->load->view('home');
        }

    }

    function isAdmin(){
        $loggedIn = $this->ci->session->userdata('logged_in');
        $currentUserId = $this->ci->session->userdata('user_id');
        if($loggedIn){
            $this->ci->load->model('User_model');
            $result = $this->ci->User_model->is_admin($currentUserId);
            if($result){
               return true;
            }
            else{
                return false;
            }
        }
    }



}

