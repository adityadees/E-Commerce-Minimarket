<?php

class BackendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('loginadmin');
			redirect($url);
		};
		$this->load->model('Mymod');
	}

	public function index()
	{
		$y['title']='Dashboard';
		$x['cp'] = $this->Mymod->countproduk();
		$x['cus'] = $this->Mymod->cuser();
		$x['cord'] = $this->Mymod->cord();
		$x['sumprof'] = $this->Mymod->sumprof();

		$table=[
			'pemesanan' => 'user_id',
			'user' => 'user_id'
		];

		$where = [
			't1.pemesanan_status' => 'selesai'
		];

		$x['recentuser'] = $this->Mymod->GetDataJoinlimit($table,$where);
		$x['indexcart'] = $this->Mymod->chartindex();
		$x['indexlastorder'] = $this->Mymod->indexlastorder();

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/index',$x);
		$this->load->view('backend/layout/footer');
	}
	

	public function laporan()
	{
		$y['title']='Laporan';
		$x['data'] = $this->Mymod->JoinPesan();
		$x['datas'] = $this->Mymod->JoinBayar();
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/laporan/laporan',$x);
		$this->load->view('backend/layout/footer');
	}
	
	public function produk()
	{

		$jtable=[
			'produk' => 'list_id',
			'list' => 'list_id'
		];
		$prod = $this->Mymod->GetDataJoinNW($jtable)->result_array();
		$list_data = $this->Mymod->ViewData('list');
		$x['produk'] = $prod;
		$x['datalist'] = $list_data;
		$y['title']='Produk';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/produk/produk',$x);
		$this->load->view('backend/layout/footer');
	}
	public function invoice()
	{
		$segment=$this->uri->segment(3);

		$where=[
			't1.pemesanan_kode'=>$segment,
		];

		$jtable=[
			'pemesanan' => 'pemesanan_kode',
			'pemesanan_detailp' => 'pemesanan_kode',
			'pemesanan_ship' => 'pemesanan_kode',
			'pembayaran' => 'pemesanan_kode',
		];


		$data = $this->Mymod->GetDataJoinArr($jtable,$where);
		$y['title']='Invoice';
		$x['data'] = $data->row_array();

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/transaksi/invoice',$x);
		$this->load->view('backend/layout/footer');
	}

	public function cetak()
	{
		$segment=$this->uri->segment(3);

		$where=[
			't1.pemesanan_kode'=>$segment,
		];

		$jtable=[
			'pemesanan' => 'pemesanan_kode',
			'pemesanan_detailp' => 'pemesanan_kode',
			'pemesanan_ship' => 'pemesanan_kode',
			'pembayaran' => 'pemesanan_kode',
		];


		$data = $this->Mymod->GetDataJoinArr($jtable,$where);
		$y['title']='Invoice';
		$x['data'] = $data->row_array();

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/transaksi/cetak',$x);
		$this->load->view('backend/layout/footer');
	}



	public function promo()
	{

		$jtable=[
			'produk' => 'produk_kode',
			'promo' => 'produk_kode'
		];
		$promo = $this->Mymod->GetDataJoinNW($jtable)->result_array();
		$produk = $this->Mymod->ViewData('produk');
		$x['promo'] = $promo;
		$x['produk'] = $produk;
		$y['title']='Produk';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/produk/promo',$x);
		$this->load->view('backend/layout/footer');
	}
	public function rekening()
	{
		$rekening = $this->Mymod->ViewData('rekening');
		$x['rekening'] = $rekening;
		$y['title']='Bank';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/rekening/rekening',$x);
		$this->load->view('backend/layout/footer');
	}
	public function kategori()
	{
		$table='kategori';
		$data = $this->Mymod->ViewData($table);
		$x['kategori'] = $data;
		$y['title']='kategori';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/produk/kategori',$x);
		$this->load->view('backend/layout/footer');
	}
	public function subkategori()
	{

		$jtable=[
			'kategori' => 'kategori_id',
			'sub_kategori' => 'kategori_id'
		];

		$kategori = $this->Mymod->ViewData('kategori');

		$data = $this->Mymod->GetDataJoinNW($jtable)->result_array();
		$x['subkategori'] = $data;
		$x['kategori'] = $kategori;
		$y['title']='Sub-Kategori';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/produk/sub_kategori',$x);
		$this->load->view('backend/layout/footer');
	}
	public function list()
	{

		$jtable=[
			'list' => 'sk_id',
			'sub_kategori' => 'sk_id'
		];

		$subkategori = $this->Mymod->ViewData('sub_kategori');

		$data = $this->Mymod->GetDataJoinNW($jtable)->result_array();
		$x['listdata'] = $data;
		$x['subkategori'] = $subkategori;
		$y['title']='List';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/produk/list',$x);
		$this->load->view('backend/layout/footer');
	}

	public function pemesanan()
	{
		$y['title']='Pemesanan';

		$x['data'] = $this->Mymod->JoinPesan();

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/transaksi/pemesanan',$x);
		$this->load->view('backend/layout/footer');
	}

	public function pembayaran()
	{
		$y['title']='Pembayaran';
		$x['data'] = $this->Mymod->JoinBayar();
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/transaksi/pembayaran',$x);
		$this->load->view('backend/layout/footer');
	}

	public function user()
	{
		$table='user';
		$data = $this->Mymod->ViewData($table);
		$x['user'] = $data;
		$y['title']='user';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/user/user',$x);
		$this->load->view('backend/layout/footer');
	}


	public function slider()
	{
		$table='slider';
		$data = $this->Mymod->ViewData($table);
		$x['slider'] = $data;
		$y['title']='Slider';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/slider/slider',$x);
		$this->load->view('backend/layout/footer');
	}

	public function save_user(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$repassword=$this->input->post('repassword');
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$tel=$this->input->post('tel');
		$alamat=$this->input->post('alamat');
		$jk=$this->input->post('jk');
		$role=$this->input->post('role');

		$table='user';
		$where='user_username';
		$data=$username;
		$cekuname=$this->Mymod->ViewNumRows($table,$where,$data);

		if($cekuname==1){
			$this->session->set_flashdata('error', 'Username telah dipakai, silahkan ulangi lagi');
			redirect('admin/user');	
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
				redirect('admin/user');		
			}else {
				$this->session->set_flashdata('error', 'Password tidak sama, silahkan diulangi lagi');
				redirect('admin/user');		
			}
		}


	}	


	function edit_user(){
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$tel=$this->input->post('tel');
		$alamat=$this->input->post('alamat');
		$jk=$this->input->post('jk');
		$role=$this->input->post('role');
		$user_id=$this->input->post('user_id');
		if($jk=='on'){
			$jk='L';
		}else {
			$jk='P';
		}

		$title = 'User';

		$table='user';
		$data=[
			'user_nama'=>$nama,
			'user_email'=>$email,
			'user_alamat'=>$alamat,
			'user_jk'=>$jk,
			'user_tel'=>$tel,
			'user_role'=>$role
		];
		$where =[ 
			'user_id' => $user_id
		];		
		$this->Mymod->UpdateData($table,$data,$where);
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('admin/user');		
	}	


	function konfirmasi_pembayaran(){
		$pembayaran_kode=$this->input->post('pembayaran_kode');
		$title = 'Konfirmasi';

		$table='pembayaran';
		$data=[
			'pembayaran_status'=>'selesai',
		];
		$where =[ 
			'pembayaran_kode' => $pembayaran_kode
		];		
		$this->Mymod->UpdateData($table,$data,$where);
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('admin/pemesanan');		
	}

	function konfirmasi_pengiriman(){
		$pemesanan_kode=$this->input->post('pemesanan_kode');
		$title = 'Konfirmasi';

		$table='pemesanan';
		$data=[
			'pemesanan_status'=>'selesai',
		];
		$where =[ 
			'pemesanan_kode' => $pemesanan_kode
		];		
		$this->Mymod->UpdateData($table,$data,$where);
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('admin/pemesanan');		
	}

	function delete_user(){
		$title = 'User';
		$user_id=$this->input->post('user_id');
		$table='user';

		$where =[ 
			'user_id' => $user_id
		];
		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		redirect('admin/user');
	}		

	function save_kategori(){

		$kategori_nama=$this->input->post('kategori_nama');
		$keterangan=$this->input->post('keterangan');
		$title='kategori';
		$table='kategori';

		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 700;
			$config['height'] = 700;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$kategori_gambar = $uploadData['file_name'];
			}else{
				$kategori_gambar='defaultkat.png';
			}
		}else{
			$kategori_gambar='defaultkat.png';
		}
		$data =[ 
			'kategori_nama'=>$kategori_nama,
			'kategori_ket'=>$keterangan,
			'kategori_gambar' => $kategori_gambar
		];
		$InsertData=$this->Mymod->InsertData($table,$data);
		if($InsertData){
			$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
			redirect('admin/kategori');		
		}else{
			$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
			redirect('admin/kategori');		
		}
	}	


	function save_promo(){
		$produk_kode=$this->input->post('produk_kode');
		$promo_diskon=$this->input->post('promo_diskon');
		$promo_start=$this->input->post('promo_start');
		$promo_end=$this->input->post('promo_end');

		$title='Promo';
		$table='promo';
		$data=[
			'produk_kode'=>$produk_kode,
			'promo_diskon'=>$promo_diskon,
			'promo_start'=>$promo_start,
			'promo_end'=>$promo_end
		];
		$rd=$this->Mymod->insertData($table,$data);
		$this->session->set_flashdata('success', 'Berhasil menambah '.$title);
		redirect('admin/promo');
	}	
	function save_subkategori(){
		$sk_nama=$this->input->post('sk_nama');
		$kategori_id=$this->input->post('kategori_id');

		$title='Sub-Kategori';
		$table='sub_kategori';
		$data=[
			'sk_nama'=>$sk_nama,
			'kategori_id'=>$kategori_id
		];
		$rd=$this->Mymod->insertData($table,$data);
		$this->session->set_flashdata('success', 'Berhasil menambah '.$title);
		redirect('admin/subkategori');
	}	

	function save_list(){
		$list_nama=$this->input->post('list_nama');
		$sk_id=$this->input->post('sk_id');

		$title='List';
		$table='list';
		$data=[
			'list_nama'=>$list_nama,
			'sk_id'=>$sk_id
		];
		$rd=$this->Mymod->insertData($table,$data);
		$this->session->set_flashdata('success', 'Berhasil menambah '.$title);
		redirect('admin/list');
	}	


	function edit_kategori(){
		$kategori_nama=$this->input->post('kategori_nama');
		$keterangan=$this->input->post('keterangan');
		$kategori_id=$this->input->post('kategori_id');
		$title = 'kategori';
		$table='kategori';

		$where = [
			'kategori_id' => $kategori_id
		];

		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 700;
			$config['height'] = 700;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$kategori_gambar = $uploadData['file_name'];

				$data = [
					'kategori_nama'=>$kategori_nama,
					'kategori_ket'=>$keterangan,
					'kategori_gambar' => $kategori_gambar
				];
				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/kategori');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/kategori');		
				}
			}else{
				
				$data =[ 
					'kategori_nama'=>$kategori_nama,
					'kategori_ket'=>$keterangan,
				];
				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/kategori');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/kategori');		
				}
			}
		}else{

			$data =[ 
				'kategori_nama'=>$kategori_nama,
				'kategori_ket'=>$keterangan,
			];
			$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
			if($UpdateData){
				$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
				redirect('admin/kategori');		
			}else{
				$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
				redirect('admin/kategori');		
			}
		}







	}

	function delete_kategori(){
		$title = 'kategori';
		$kategori_id=$this->input->post('kategori_id');
		$table='kategori';

		$where = [
			'kategori_id' => $kategori_id
		];
		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		redirect('admin/kategori');
	}		


	function edit_list(){
		$list_nama=$this->input->post('list_nama');
		$sk_id=$this->input->post('sk_id');
		$list_id=$this->input->post('list_id');
		$title = 'List';
		$table='list';
		$data=[
			'list_nama'=>$list_nama,
			'sk_id'=>$sk_id
		];
		$where =[ 
			'list_id' => $list_id
		];
		$this->Mymod->UpdateData($table,$data,$where);
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('admin/list');		
	}

	function delete_list(){
		$title = 'List';
		$list_id=$this->input->post('list_id');
		$table='list';

		$where = [
			'list_id' => $list_id
		];
		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		redirect('admin/list');
	}		


	function edit_subkategori(){
		$sk_nama=$this->input->post('sk_nama');
		$sk_id=$this->input->post('sk_id');
		$kategori_id=$this->input->post('kategori_id');
		$title = 'Sub-Kategori';
		$table='sub_kategori';
		$data=[
			'sk_nama'=>$sk_nama,
			'kategori_id'=>$kategori_id
		];
		$where =[ 
			'sk_id' => $sk_id
		];
		$this->Mymod->UpdateData($table,$data,$where);
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('admin/subkategori');		
	}

	function delete_subkategori(){
		$title = 'Sub-Kategori';
		$sk_id=$this->input->post('sk_id');
		$table='sub_kategori';

		$where = [
			'sk_id' => $sk_id
		];
		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		redirect('admin/subkategori');
	}		

	public function save_slider(){
		$slider_judul=$this->input->post('slider_judul');
		$keterangan=$this->input->post('keterangan');
		$table='slider';
		$title='slider';

		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 1920;
			$config['height'] = 683;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$slider_gambar = $uploadData['file_name'];
			}else{
				$slider_gambar='';
			}
		}else{
			$slider_gambar='';
		}

		$data =[ 
			'slider_judul' => $slider_judul,
			'slider_ket' => $keterangan,
			'slider_gambar' => $slider_gambar
		];
		$InsertData=$this->Mymod->InsertData($table,$data);
		if($InsertData){
			$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
			redirect('admin/slider');		
		}else{
			$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
			redirect('admin/slider');		
		}

	}	


	function edit_slider(){
		$slider_judul=$this->input->post('slider_judul');
		$slider_id=$this->input->post('slider_id');
		$keterangan=$this->input->post('keterangan');
		$table='slider';
		$title='slider';

		$where = [
			'slider_id' => $slider_id
		];

		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 1920;
			$config['height'] = 683;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$slider_gambar = $uploadData['file_name'];

				$data = [
					'slider_judul' => $slider_judul,
					'slider_ket' => $keterangan,
					'slider_gambar' => $slider_gambar
				];
				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/slider');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/slider');		
				}
			}else{
				
				$data =[ 
					'slider_judul' => $slider_judul,
					'slider_ket' => $keterangan,
				];
				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/slider');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/slider');		
				}
			}
		}else{

			$data =[ 
				'slider_judul' => $slider_judul,
				'slider_ket' => $keterangan,
			];
			$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
			if($UpdateData){
				$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
				redirect('admin/slider');		
			}else{
				$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
				redirect('admin/slider');		
			}
		}
	}

	function delete_slider(){
		$title = 'slider';
		$slider_id=$this->input->post('slider_id');
		$table='slider';

		$where =[ 
			'slider_id' => $slider_id
		];
		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		redirect('admin/slider');
	}		



	public function save_produk(){
		$produk_kode=$this->input->post('produk_kode');
		$produk_nama=$this->input->post('produk_nama');
		$produk_harga=$this->input->post('produk_harga');
		$produk_up=$this->input->post('produk_up');
		$list_id=$this->input->post('list_id');
		$keterangan=$this->input->post('keterangan');
		$table='produk';
		$title='produk';

		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 1000;
			$config['height'] = 750;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$produk_gambar = $uploadData['file_name'];
				$data = [
					'produk_kode' => $produk_kode,
					'produk_nama' => $produk_nama,
					'list_id' => $list_id,
					'produk_harga' => $produk_harga,
					'produk_up' => $produk_up,
					'produk_ket' => $keterangan,
					'produk_gambar' => $produk_gambar
				];
				$InsertData=$this->Mymod->InsertData($table,$data);
				if($InsertData){
					$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
					redirect('admin/produk');		
				}else{
					$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
					redirect('admin/produk');		
				}


			}else{
				$data =[ 
					'produk_kode' => $produk_kode,
					'produk_nama' => $produk_nama,
					'list_id' => $list_id,
					'produk_harga' => $produk_harga,
					'produk_up' => $produk_up,
					'produk_ket' => $keterangan,
				];
				$InsertData=$this->Mymod->InsertData($table,$data);
				if($InsertData){
					$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
					redirect('admin/produk');		
				}else{
					$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
					redirect('admin/produk');		
				}
			}
		}else{
			$data = [
				'produk_kode' => $produk_kode,
				'produk_nama' => $produk_nama,
				'list_id' => $list_id,
				'produk_harga' => $produk_harga,
				'produk_up' => $produk_up,
				'produk_ket' => $keterangan,
			];
			$InsertData=$this->Mymod->InsertData($table,$data);
			if($InsertData){
				$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
				redirect('admin/produk');		
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
				redirect('admin/produk');		
			}
		}


	}	

	public function save_rekening(){
		$rekening_bank=$this->input->post('rekening_bank');
		$rekening_nama=$this->input->post('rekening_nama');
		$rekening_nomor=$this->input->post('rekening_nomor');
		$table='rekening';
		$title='Rekening';

		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 1000;
			$config['height'] = 750;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$rekening_gambar = $uploadData['file_name'];
				$data = [
					'rekening_bank' => $rekening_bank,
					'rekening_nama' => $rekening_nama,
					'rekening_nomor' => $rekening_nomor,
					'rekening_gambar' => $rekening_gambar
				];
				$InsertData=$this->Mymod->InsertData($table,$data);
				if($InsertData){
					$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
					redirect('admin/rekening');		
				}else{
					$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
					redirect('admin/rekening');		
				}
			}else{
				$data =[
					'rekening_bank' => $rekening_bank,
					'rekening_nama' => $rekening_nama,
					'rekening_nomor' => $rekening_nomor,
				];
				$InsertData=$this->Mymod->InsertData($table,$data);
				if($InsertData){
					$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
					redirect('admin/rekening');		
				}else{
					$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
					redirect('admin/rekening');		
				}
			}
		}else{
			$data =[ 
				'rekening_bank' => $rekening_bank,
				'rekening_nama' => $rekening_nama,
				'rekening_nomor' => $rekening_nomor,
			];
			$InsertData=$this->Mymod->InsertData($table,$data);
			if($InsertData){
				$this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
				redirect('admin/rekening');		
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah data '.$title);
				redirect('admin/rekening');		
			}
		}


	}	

	public function edit_produk(){
		$produk_kode=$this->input->post('produk_kode');
		$produk_nama=$this->input->post('produk_nama');
		$produk_harga=$this->input->post('produk_harga');
		$produk_up=$this->input->post('produk_up');
		$list_id=$this->input->post('list_id');
		$keterangan=$this->input->post('keterangan');
		$table='produk';
		$title='produk';

		$where =[ 
			'produk_kode' => $produk_kode
		];


		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 1000;
			$config['height'] = 750;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$produk_gambar = $uploadData['file_name'];
				$data = [
					'produk_nama' => $produk_nama,
					'list_id' => $list_id,
					'produk_harga' => $produk_harga,
					'produk_ket' => $keterangan,
					'produk_up' => $produk_up,
					'produk_gambar' => $produk_gambar
				];

				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/produk');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/produk');		
				}
			}else{

				$data = [
					'produk_kode' => $produk_kode,
					'produk_nama' => $produk_nama,
					'list_id' => $list_id,
					'produk_up' => $produk_up,
					'produk_harga' => $produk_harga,
					'produk_ket' => $keterangan,
				];

				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/produk');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/produk');		
				}
			}
		}else{

			$data = [
				'produk_kode' => $produk_kode,
				'produk_nama' => $produk_nama,
				'list_id' => $list_id,
				'produk_up' => $produk_up,
				'produk_harga' => $produk_harga,
				'produk_ket' => $keterangan,
			];
			
			$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
			if($UpdateData){
				$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
				redirect('admin/produk');		
			}else{
				$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
				redirect('admin/produk');		
			}
		}
	}
	public function edit_rekening(){
		$rekening_id=$this->input->post('rekening_id');
		$rekening_bank=$this->input->post('rekening_bank');
		$rekening_nama=$this->input->post('rekening_nama');
		$rekening_nomor=$this->input->post('rekening_nomor');
		$table='rekening';
		$title='Rekening';

		$where =[ 
			'rekening_id' => $rekening_id
		];


		if(!empty($_FILES['filefoto']['name'])){
			$config['upload_path'] = 'assets\images';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['filefoto']['name'];
			$config['width'] = 1000;
			$config['height'] = 750;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('filefoto')){
				$uploadData = $this->upload->data();
				$rekening_gambar = $uploadData['file_name'];
				$data = [
					'rekening_bank' => $rekening_bank,
					'rekening_nama' => $rekening_nama,
					'rekening_nomor' => $rekening_nomor,
					'rekening_gambar' => $rekening_gambar
				];

				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/rekening');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/rekening');		
				}
			}else{

				$data = [
					'rekening_id' => $rekening_id,
					'rekening_bank' => $rekening_bank,
					'rekening_nama' => $rekening_nama,
					'rekening_nomor' => $rekening_nomor,
				];

				$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
				if($UpdateData){
					$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
					redirect('admin/rekening');		
				}else{
					$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
					redirect('admin/rekening');		
				}
			}
		}else{

			$data = [
				'rekening_id' => $rekening_id,
				'rekening_bank' => $rekening_bank,
				'rekening_nama' => $rekening_nama,
				'rekening_nomor' => $rekening_nomor,
			];
			
			$UpdateData=$this->Mymod->UpdateData($table,$data,$where);
			if($UpdateData){
				$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
				redirect('admin/rekening');		
			}else{
				$this->session->set_flashdata('error', 'Gagal merubah data '.$title);
				redirect('admin/rekening');		
			}
		}
	}	



	public function delete_produk(){
		$title = 'produk';
		$produk_kode=$this->input->post('produk_kode');
		$table='produk';

		$where = [
			'produk_kode' => $produk_kode
		];
		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		redirect('admin/produk');
	}		
	function delete_rekening(){
		$title = 'Rekening';
		$rekening_id=$this->input->post('rekening_id');
		$table='rekening';

		$where =[ 
			'rekening_id' => $rekening_id
		];
		$this->Mymod->DeleteData($table,$where);
		$this->session->set_flashdata('success', 'Berhasil menghapus data '.$title);
		redirect('admin/rekening');
	}		

	public function sendWhatsapp(){
		$user = $this->input->post('user');
		$message = $this->input->post('message');
		$area = '62';
		$str = $user;
		$str[0] = '';
		$nphone = $str.$area;
		$red = "https://wa.me/".$nphone."?text=".$message;

		//echo "<script>
		//window.open("."'".$red."'".");
		//</script>";
	//	redirect('admin');
		redirect($red);	

	}

}