<?php
	$this->load->view('admin/template/header', array('title' => $title));
	$this->load->view('admin/template/topbar');
	$this->load->view('admin/template/sidebar');
	$this->load->view($content);
	$this->load->view('admin/template/footer');
?>
