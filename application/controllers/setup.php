<?php 
class Setup extends CI_Controller
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

    function show404(){
        $this->load->view('errors/404');
    }






    


    

    


    

    
    
}
?>