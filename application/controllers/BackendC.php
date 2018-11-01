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
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/index');
		$this->load->view('backend/layout/footer');
	}
	
	public function produk()
	{
		$prod = $this->Mymod->ViewData('produk');
		$kat = $this->Mymod->ViewData('kategori');
		$x['produk'] = $prod;
		$x['kategori'] = $kat;
		$y['title']='Produk';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/produk/produk',$x);
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

	public function pemesanan()
	{
		$y['title']='Dashboard';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/transaksi/pemesanan');
		$this->load->view('user/user');
		$this->load->view('backend/layout/footer');
	}

	public function pembayaran()
	{
		$y['title']='Dashboard';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/transaksi/pembayaran');
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

	public function save_kategori(){
		$kategori_nama=$this->input->post('kategori_nama');
		$keterangan=$this->input->post('keterangan');

		$title='kategori';
		$table='kategori';
		$data=[
			'kategori_nama'=>$kategori_nama,
			'kategori_ket'=>$keterangan
		];
		$rd=$this->Mymod->insertData($table,$data);
		$this->session->set_flashdata('success', 'Berhasil menambah '.$title);
		redirect('admin/user');
	}	


	function edit_kategori(){
		$kategori_nama=$this->input->post('kategori_nama');
		$keterangan=$this->input->post('keterangan');
		$kategori_id=$this->input->post('kategori_id');
		$title = 'kategori';
		$table='kategori';
		$data=[
			'kategori_nama'=>$kategori_nama,
			'kategori_ket'=>$keterangan
		];
		$where =[ 
			'kategori_id' => $kategori_id
		];
		$this->Mymod->UpdateData($table,$data,$where);
		$this->session->set_flashdata('success', 'Berhasil merubah data '.$title);
		redirect('admin/kategori');		
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
		$produk_kategori=$this->input->post('produk_kategori');
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
					'kategori_id' => $produk_kategori,
					'produk_harga' => $produk_harga,
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
					'kategori_id' => $produk_kategori,
					'produk_harga' => $produk_harga,
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
				'kategori_id' => $produk_kategori,
				'produk_harga' => $produk_harga,
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
		$produk_kategori=$this->input->post('produk_kategori');
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
					'kategori_id' => $produk_kategori,
					'produk_harga' => $produk_harga,
					'produk_ket' => $keterangan,
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
					'produk_nama' => $produk_nama,
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
				'kategori_id' => $produk_kategori,
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

}