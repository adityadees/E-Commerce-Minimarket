<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymod extends CI_Model{

    public function cekadminlogin($user_username,$user_password){
        $res=$this->db->query("SELECT * FROM user WHERE user_username='$user_username' AND user_password=md5('$user_password')");
        return $res;
    }

    public function countproduk(){
        $this->db->select('count(*) as cproduk');
        $this->db->from('produk');
        $res= $this->db->get();
        return $res->row_array();
    }

    public function cuser(){
        $this->db->select('count(*) as cuser');
        $this->db->from('user');
        $this->db->where('user_role','customer');
        $res= $this->db->get();
        return $res->row_array();
    }

    public function cord(){
        $this->db->select('count(*) as cord');
        $this->db->from('pemesanan');
        $this->db->where('pemesanan_status','selesai');
        $res= $this->db->get();
        return $res->row_array();
    }
    public function indexlastorder(){
        $res = $this->db->query("SELECT * FROM pemesanan inner join user on pemesanan.user_id=user.user_id order by pemesanan_tanggal desc limit 5");
        return $res;
    }
    public function sumprof(){
        $this->db->select('sum(pemesanan_total) as sprof');
        $this->db->from('pemesanan');
        $this->db->where('pemesanan_status','selesai');
        $res= $this->db->get();
        return $res->row_array();
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

    public function chartindex(){
        $res = $this->db->query("SELECT sum(pemesanan_total) as sumtot, COUNT(*) as coall, pemesanan_tanggal from pemesanan where pemesanan_status='selesai' GROUP by month(pemesanan_tanggal)");
        return $res->result_array();
    }
    public function GetDataJoinlimit($table,$where){
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
        $this->db->limit('5');
        $res = $this->db->get();
        return $res;
    }

    public function best_seller(){
        $res = $this->db->query("SELECT produk_kode,count(produk_kode) as jumlah from pemesanan_detailp  GROUP by produk_kode order by jumlah desc");
        return $res;
    }

    public function GetDataJoinArr($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $j=1;
        foreach($table as $table_name=>$table_id){ 
            if($j==1){$this->db->from(''.$table1.' t1');} else {
                $this->db->join(''.${'table'.$j}.' t'.$j,'t1.'.${'t'.$j.'id'}.'=t'.$j.'.'.${'t'.$j.'id'});
            }
            $j++;
        }
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }


    public function related($where){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join ( 'list', 'produk.list_id = list.list_id' , 'left' );
        $this->db->join ( 'sub_kategori', 'list.sk_id = sub_kategori.sk_id' , 'left' );
        $this->db->join ( 'kategori', 'kategori.kategori_id = sub_kategori.kategori_id' , 'left' );
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }

    public function JoinPesan(){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join ( 'pembayaran', 'pemesanan.pemesanan_kode = pembayaran.pemesanan_kode' , 'left' );
        $this->db->join ( 'user', 'pemesanan.user_id = user.user_id' , 'left' );
        $res = $this->db->get();
        return $res;
    }
    public function JoinBayar(){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join ( 'pembayaran', 'pemesanan.pemesanan_kode = pembayaran.pemesanan_kode' , 'inner' );
        $this->db->join ( 'user', 'pemesanan.user_id = user.user_id' , 'inner' );
        $this->db->where ( 'pembayaran.pembayaran_status', 'selesai' );
        $res = $this->db->get();
        return $res;
    }
    public function joinsubkat($kode){
        $this->db->select('*');
        $this->db->from('sub_kategori');
        $this->db->join ( 'list', 'sub_kategori.sk_id = list.sk_id' , 'inner' );
        $this->db->join ( 'produk', 'produk.list_id = list.list_id' , 'inner' );
        $this->db->where ( 'sub_kategori.sk_id', $kode );
        $res = $this->db->get();
        return $res;
    }
    public function joinkat($kode){
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join ( 'sub_kategori', 'kategori.kategori_id = sub_kategori.kategori_id' , 'inner' );
        $this->db->join ( 'list', 'sub_kategori.sk_id = list.sk_id' , 'inner' );
        $this->db->join ( 'produk', 'produk.list_id = list.list_id' , 'inner' );
        $this->db->where ( 'kategori.kategori_id', $kode );
        $res = $this->db->get();
        return $res;
    }

    public function joinlist($kode){
        $this->db->select('*');
        $this->db->from('list');
        $this->db->join ( 'produk', 'produk.list_id = list.list_id' , 'inner' );
        $this->db->where ( 'list.list_id', $kode );
        $res = $this->db->get();
        return $res;
    }

    public function countkat($kat){
        $res = $this->db->query("SELECT
            kategori.kategori_id,
            COUNT(produk.produk_kode) AS Total
            FROM
            kategori
            LEFT JOIN sub_kategori on kategori.kategori_id=sub_kategori.kategori_id
            LEFT JOIN list ON list.sk_id = sub_kategori.sk_id
            LEFT JOIN produk on produk.list_id=list.list_id
            WHERE kategori.kategori_id=$kat
            GROUP BY kategori.kategori_id");
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

    public function getProdukNotParent($produk_kode){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('produk_kode !=',$produk_kode);
        $res = $this->db->get();
        return $res;
    }


}
