<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Mymod');
    }
    function auth(){
        $user_username=strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
        $user_password=strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));
        $user_role='customer';
        $table='user';

        $where= [
            'user_username'=>$user_username,
            'user_password'=>md5($user_password),
            'user_role'=>$user_role
        ];

        $cekuser=$this->Mymod->CekDataRows($table,$where);
        if($cekuser->num_rows() > 0){
            $xcekuser=$cekuser->row_array();
            $newdata = [
                'user_username'   => $xcekuser['user_username'],
                'user_role'   => $xcekuser['user_role'],
                'user_nama'   => $xcekuser['user_nama'],
                'user_id'   => $xcekuser['user_id'],
                'logged_in_user' => TRUE
            ];

            $this->session->set_userdata($newdata);
            $url=base_url();
            $this->session->set_flashdata('successlogin', $newdata['user_nama']);
            redirect($url); 
        }else{
            redirect('login/gagallogin'); 
        }
    }

    function register(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $repassword=$this->input->post('repassword');
        $nama=$this->input->post('nama');
        $email=$this->input->post('email');
        $tel=$this->input->post('tel');
        $alamat=$this->input->post('alamat');
        $jk=$this->input->post('jk');
        $role='customer';

        $table='user';
        $where='user_username';
        $data=$username;
        $cekuname=$this->Mymod->ViewNumRows($table,$where,$data);

        if($cekuname==1){
            $this->session->set_flashdata('error', 'Username telah dipakai, silahkan ulangi lagi');
            redirect('Register'); 
        }else{
            if($password==$repassword){

                if($jk=='on'){
                    $jk='L';
                }else {
                    $jk='P';
                }
                $title='User';
                $table='user';
                $data=[
                    'user_username'=>$username,
                    'user_password'=>md5($password),
                    'user_nama'=>$nama,
                    'user_email'=>$email,
                    'user_alamat'=>$alamat,
                    'user_jk'=>$jk,
                    'user_tel'=>$tel,
                    'user_role'=>$role,
                ];
                $rd=$this->Mymod->InsertData($table,$data);
                $this->session->set_flashdata('success', 'Berhasil menambah '.$title);
                redirect('Register');     
            }else {
                $this->session->set_flashdata('error', 'Password tidak sama, silahkan diulangi lagi');
                redirect('Register');     
            }
        }


    }   

    function gagallogin(){
        $url=base_url('Login');
        $this->session->set_flashdata('error', 'Username atau password salah silahkan ulangi lagi');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }
}