<?php
class Extendadd extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	if(isset($_SESSION['logged_in_user']){
		$ses_user=$_SESSION['user_id'];
		$join='user';
		$where=[
			't1.user_id'=>$ses_user,
		];

		$jtable=[
			'keranjang' => 'produk_kode',
			'produk' => 'produk_kode'
		];
		$getcart = $this->Mymod->GetDataJoin($jtable,$where);

		$v['countcart']=$getcart->num_rows();
		$v['getCartData']=$getcart->result_array();
	}
}
?>