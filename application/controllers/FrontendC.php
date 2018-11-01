<?php

class FrontendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	public function index()
	{

		$prod = $this->Mymod->ViewData('produk');
		$kat = $this->Mymod->ViewData('kategori');
		$slide = $this->Mymod->ViewData('slider');
		$x['produk'] = $prod;
		$x['kategori'] = $kat;
		$z['slider'] = $slide;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/slider/slider',$z);
		$this->load->view('frontend/index',$x);
		$this->load->view('frontend/layout/footer');

	}
	public function cart()
	{
		if(isset($_SESSION['logged_in_user'])){
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

			$x['getCartData']=$getcart->result_array();
		}
		$y['title']='Cart';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/myaccount/cart',$x);
		$this->load->view('frontend/layout/footer');

	}


	public function checkout()
	{
		if(isset($_SESSION['logged_in_user'])){
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
			$getRekening = $this->Mymod->ViewData('rekening');

			$whreuser=[
				'user_id'=>$_SESSION['user_id'],
			];
			$getUser = $this->Mymod->CekDataRows('user',$whreuser);

			$x['getCartData']=$getcart->result_array();
			$x['rekening']=$getRekening;
			$x['user']=$getUser->row_array();
		}
		$y['title']='Cart';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/myaccount/checkout',$x);
		$this->load->view('frontend/layout/footer');

	}

	public function produk_detail()
	{

		$kode=$this->uri->segment(3);
		$table='produk';
		$where='produk_kode';
		$data=$kode;
		$prod = $this->Mymod->ViewDetail($table,$where,$data);
		$x['produk'] = $prod;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/produk/produk_detail',$x);
		$this->load->view('frontend/layout/footer');
	}


	public function register(){
		$y['title']='Register';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/form/register');
		$this->load->view('frontend/layout/footer');
	}

	public function login(){
		$y['title']='Login';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/form/login');
		$this->load->view('frontend/layout/footer');
	}

	public function myorders(){
		$y['title']='Login';
		$user_id=$_SESSION['user_id'];
		$pemesanan_status='waiting';
		$table='pemesanan';
		$where=[
			'user_id'=>$user_id,
			'pemesanan_status'=>$pemesanan_status
		];
		$x['waiting'] = $waiting = $this->Mymod->ViewDataWhere($table,$where);
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/myaccount/myorders',$x);
		$this->load->view('frontend/layout/footer');
	}

	public function produk(){
		$prod = $this->Mymod->ViewData('produk');
		$kat = $this->Mymod->ViewData('kategori');
		$x['produk'] = $prod;
		$x['kategori'] = $kat;
		$y['title']='Produk';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/produk/produk',$x);
		$this->load->view('frontend/layout/footer');	
	}

	public function contactus(){
		$y['title']='Contact Us';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/contact/contactus');
		$this->load->view('frontend/layout/footer');		
	}

	public function myaccount(){
		$y['title']='My Account';
		if(isset($_SESSION['logged_in_user'])){
			$data=$_SESSION['user_id'];
			$table='user';
			$where='user_id';
			$user = $this->Mymod->ViewDetail($table,$where,$data);
			$x['user'] = $user;
			$this->load->view('frontend/layout/header',$y);
			$this->load->view('frontend/layout/topbar');
			$this->load->view('frontend/myaccount/myaccount',$x);
			$this->load->view('frontend/layout/footer');	
		}
	}
	public function myprofil(){
		$y['title']='My Accoyunt';
		if(isset($_SESSION['logged_in_user'])){
			$data=$_SESSION['user_id'];
			$table='user';
			$where='user_id';
			$user = $this->Mymod->ViewDetail($table,$where,$data);
			$x['user'] = $user;
			$this->load->view('frontend/layout/header',$y);
			$this->load->view('frontend/layout/topbar');
			$this->load->view('frontend/myaccount/myprofil',$x);
			$this->load->view('frontend/layout/footer');	
		}
	}

	public function addtocart(){

		$produk_kode=$this->input->post('produk_kode');
		$qty=$this->input->post('qty');
		$ukuran=$this->input->post('ukuran');
		$user_id=$_SESSION['user_id'];


		$title='Keranjang';
		$table='keranjang';
		
		$where=[
			'produk_kode'=>$produk_kode,
			'user_id'=>$user_id,
			'keranjang_ukuran'=>$ukuran
		];

		$cekproduk=$this->Mymod->CekDataRows($table,$where);
		if($cekproduk->num_rows()>0){
			$getprod=$cekproduk->row_array();
			$keranjang_id=$getprod['keranjang_id'];
			$keranjang_qty=$getprod['keranjang_qty'];

			$where=[
				'keranjang_id'=>$keranjang_id
			];

			$newqty=$qty+$keranjang_qty;
			$data=array(
				'keranjang_qty'=>$newqty,
			);
			$rd=$this->Mymod->UpdateData($table, $data, $where);
			$this->session->set_flashdata('cartsuccess', 'Berhasil merubah '.$title);
			redirect();			
			

		}else {
			$data=array(
				'produk_kode'=>$produk_kode,
				'user_id'=>$user_id,
				'keranjang_qty'=>$qty,
				'keranjang_ukuran'=>$ukuran
			);
			$rd=$this->Mymod->InsertData($table,$data);
			$this->session->set_flashdata('cartsuccess', 'Berhasil menambah '.$title);
			redirect();
		}
	}
	public function delete_cart(){
		$keranjang_id=$this->input->post('keranjang_id');
		$title = 'Keranjang';
		$table='keranjang';
		$where = array(
			'keranjang_id' => $keranjang_id
		);

		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
	}

	public function batal_pemesanan(){
		$pemesanan_kode=$this->input->post('pemesanan_kode');
		$title = 'Pemesanan';
		$table='pemesanan';
		$where =[ 
			'pemesanan_kode' => $pemesanan_kode
		];

		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;	
	}

	public function update_cart(){

	}

	public function save_checkout(){
		$pemesanan_diskon=$this->input->post('pemesanan_diskon');
		$pemesanan_ongkir=$this->input->post('pemesanan_ongkir');
		$pemesanan_total=$this->input->post('pemesanan_total');
		$pemesanan_sprice=$this->input->post('pemesanan_sprice');
		$rekening=$this->input->post('rekening');
		$user_id=$this->input->post('user_id');
		$cid=$this->input->post('cid');
		$ps_nama=$this->input->post('ps_nama');
		$ps_tanggal=$this->input->post('ps_tanggal');
		$ps_ucapan=$this->input->post('ps_ucapan');
		$ps_lokasi=$this->input->post('ps_lokasi');
		$ps_kds=$this->input->post('ps_kds');
		$produk_kode=$this->input->post('produk_kode');
		$prd_kd=$this->input->post('prd_kd');
		$pdp_qty=$this->input->post('pdp_qty');
		$pdp_size=$this->input->post('pdp_size');
		$pdp_harga=$this->input->post('pdp_harga');
		$pdp_diskon=$this->input->post('pdp_diskon');
		$pdp_subtotal=$this->input->post('pdp_subtotal');
		$pemesanan_kode=$this->input->post('pemesanan_kode');


		$data=[
			'pemesanan_kode'=>$pemesanan_kode,
			'user_id'=>$user_id,
			'rekening_id'=>$rekening,
			'pemesanan_sprice'=>$pemesanan_sprice,
			'pemesanan_diskon'=>$pemesanan_diskon,
			'pemesanan_ongkir'=>$pemesanan_ongkir,
			'pemesanan_total'=>$pemesanan_total,
		];
		$rd=$this->Mymod->insertData('pemesanan',$data);

		if($rd){
			for($count = 0; $count < sizeof($cid); $count++){
				$data=[
					'pemesanan_kode'=>$pemesanan_kode,
					'produk_kode'=>$prd_kd[$count],
					'pdp_qty'=>$pdp_qty[$count],
					'pdp_size'=>$pdp_size[$count],
					'pdp_harga'=>$pdp_harga[$count],
					'pdp_diskon'=>$pdp_diskon[$count],
					'pdp_subtotal'=>$pdp_subtotal[$count],
				];
				$this->Mymod->insertData('pemesanan_detailp',$data);
			}

			for($count = 0; $count < sizeof($ps_kds); $count++){
				$data=[
					'pemesanan_kode'=>$pemesanan_kode,
					'produk_kode'=>$produk_kode[$count],
					'ps_nama'=>$ps_nama[$count],
					'ps_tanggal'=>$ps_tanggal[$count],
					'ps_ucapan'=>$ps_ucapan[$count],
					'ps_lokasi'=>$ps_lokasi[$count],
				];
				$this->Mymod->insertData('pemesanan_ship',$data);
			}

			$table='keranjang';
			$user_id=$_SESSION['user_id'];
			$where = [
				'user_id' => $user_id
			];
			$this->Mymod->DeleteData($table,$where);
			$this->session->set_flashdata('success', 'Berhasil memesan');
			redirect('checkout');
		} else {
			$this->session->set_flashdata('success', 'Gagal memesan');
			redirect('checkout');
		}
	}


	public function update_user(){

		$user_nama=$this->input->post('user_nama');
		$user_email=$this->input->post('user_email');
		$user_tel=$this->input->post('user_tel');
		$user_alamat=$this->input->post('user_alamat');
		$user_id=$_SESSION['user_id'];

		$title='User';
		$table='user';
		
		$where=[
			'user_id'=>$user_id
		];

		$data=[
			'user_nama'=>$user_nama,
			'user_email'=>$user_email,
			'user_tel'=>$user_tel,
			'user_alamat'=>$user_alamat
		];
		$rd=$this->Mymod->UpdateData($table, $data, $where);
		if($rd){
			$this->session->set_flashdata('success', 'Berhasil merubah '.$title);
			redirect('myaccount');			
		}	else {
			$this->session->set_flashdata('error', 'Gagal merubah '.$title);
			redirect('myaccount');			
		}
	}
	public function update_password(){

		$password=$this->input->post('password');
		$repassword=$this->input->post('repassword');
		$user_id=$_SESSION['user_id'];

		$title='Password';
		$table='user';
		
		if ($password==$repassword) {

			$where=[
				'user_id'=>$user_id
			];

			$data=[
				'user_password'=>md5($password),
			];
			$rd=$this->Mymod->UpdateData($table, $data, $where);
			if($rd){
				$this->session->set_flashdata('success', 'Berhasil merubah '.$title);
				redirect('myaccount');			
			}	else {
				$this->session->set_flashdata('error', 'Gagal merubah '.$title);
				redirect('myaccount');			
			}
		} else {

			$this->session->set_flashdata('error', 'Gagal merubah '.$title);
			redirect('myaccount');			
		}


	}
	
}