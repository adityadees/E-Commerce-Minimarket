<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymod extends CI_Model{

    public function cekadminlogin($user_username,$user_password){
        $res=$this->db->query("SELECT * FROM user WHERE user_username='$user_username' AND user_password=md5('$user_password')");
        return $res;
    }


    public function ViewDetail($table,$where,$data){
        $this->db->select('*');
        $this->db->where($where,$data);
        $res = $this->db->get($table);
        return $res->row_array();
    }
    public function ViewDataWhere($table,$where){
        $this->db->select('*');
        $res=$this->db->get_where($table,$where);
        return $res->result_array();
    }
    public function ViewData($table){
        $res=$this->db->get($table);
        return $res->result_array();
    }

    public function ViewDataRows($table){
        $res=$this->db->get($table);
        return $res->num_rows();
    }
    public function data($table,$number,$offset){
        return $query = $this->db->get('produk',$number,$offset)->result_array();      
    }

    public function order_by_rand($table){
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $res = $this->db->get($table);
        return $res->row_array();
    }

    public function CekDataRows($table,$where){
        $res=$this->db->get_where($table,$where);
        return $res;
    }
    public function ViewNumRows($table,$where,$data){
        $this->db->select('*');
        $this->db->where($where,$data);
        $res = $this->db->get($table);
        return $res->num_rows();
    }

    public function InsertData($table,$data){
        $res = $this->db->insert($table, $data);
        return $res;
    }

    public function UpdateData($table, $data, $where){
        $res = $this->db->update($table, $data, $where);
        return $res;
    }


    public function DeleteData($where,$table){
        $this->db->where($table);
        $res = $this->db->delete($where);
        return $res;
    }

    public function GetDataJoin($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id);
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }


    public function GetDataJoinNW($table){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id);
        $res = $this->db->get();
        return $res;
    }



}
