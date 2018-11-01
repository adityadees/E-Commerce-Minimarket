<?php
class Loginadmin extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Mymod');
    }
    function index(){
        $this->load->view('backend/login');
    }
    function auth(){
        $user_username=strip_tags(str_replace("'", "", $this->input->post('user_username',TRUE)));
        $user_password=strip_tags(str_replace("'", "", $this->input->post('user_password',TRUE)));
        $cadmin=$this->Mymod->cekadminlogin($user_username,$user_password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();
            $newdata = array(
                'user_username'   => $xcadmin['user_username'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect('admin'); 
        }else{
            redirect('loginadmin/gagallogin'); 
        }
    }


    function gagallogin(){
        $url=base_url('admin');
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('admin');
        redirect($url);
    }
}