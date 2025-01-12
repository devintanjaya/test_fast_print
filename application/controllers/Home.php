<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('all_model');
    }

	public function index()
	{

		$data['viewoptions']['page'] = "home";
		$data['viewoptions']['title'] = "Test Fast Print";
		$data['heading'] = "Master Barang";
		$this->load->view('general/header',$data);
    	$this->load->view('content/home',$data);
    	/*$this->load->view('content/tabel_barang',$data);*/
    	$this->load->view('content/script/home-script',$data);
    	/*$this->load->view('content/script/tabel-barang-script',$data);*/
    	$this->load->view('general/footer',$data);

	}

	public function list_ajax()
	{

		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$order = $this->input->post("order");
		$search= $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$where = "";

		$this->load->model('barang_model');
		$data = $this->barang_model->generate_list_barang($start, $length, $where);
		$res = $data['query'];

		if ($res != 0) {
			//$draw = intval($this->input->get("draw"));
			$order = $this->input->post("order");
			$search= $this->input->post("search");
			$search = $search['value'];
			$col = 0;

			$data_barang = array();
			$i = 0;

			foreach ($res as $thorz => $value) {
				$data_barang[] = array(
					$value['id_produk'],
					$value['nama_produk'],
					$value['harga'],
					$value['kategori_id'],
					$value['status_id']
				);
			}
			
			/*
			foreach ($res as $thorz => $value) {
				$data_barang[] = array(
					$value['id_produk'],
					$value['nama_produk'],
					$value['harga'],
					$value['kategori_id'],
					$value['status_id']
				);
			}
			*/

			$total_barang = $data['count'];
			$data = array(
					"draw" => $draw,
					"recordsTotal" => $total_barang,
					"recordsFiltered" => $total_barang,
					"count" => $total_barang,
					"data" => $data_barang
			);
			header("Content-Type: application/json");
			echo json_encode($data);

		}

	}

	public function refresh_barang()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('barang_model');
		$status_filter = $this->input->post("status_filter");
		$where = "";
		
		if ($status_filter == 1 || $status_filter == "1") {
			$where = array(
				"status_id" => "S0001"
			);
		}

		$data = $this->barang_model->generate_list_barang(0, 0, $where);
		$data["barang"] = $data["query"];
		$this->load->view('content/tabel_barang', $data);
	}

	public function halaman_add_barang()
	{

		$data['kategori'] = $this->all_model->getall('kategori', 'id_kategori');
		$data['status'] = $this->all_model->getall('status', 'id_status');

		$data['viewoptions']['page'] = "insert-barang";
		$data['viewoptions']['title'] = "Test Fast Print";
		$data['heading'] = "Add Barang";
		$this->load->view('general/header',$data);
    	$this->load->view('content/insert-barang',$data);
    	$this->load->view('content/script/insert-barang-script',$data);
    	$this->load->view('general/footer',$data);

	}

	public function add_barang()
	{

		header('Access-Control-Allow-Origin: *');
		$this->load->model('barang_model');
		$data["cek_validasi"] = 0;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_produk', 'id_produk', 'required',
        array('required' => 'ID Produk tidak boleh kosong'));
		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'required',
        array('required' => 'Nama Produk tidak boleh kosong'));
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric',
        array('required' => 'Harga tidak boleh kosong', 'numeric' => 'Harga hanya boleh diisi angka'));

		if ($this->form_validation->run() === TRUE)
		{

			$data = array(
				'id_produk' => $this->input->post('id_produk'),
		        'nama_produk' => $this->input->post('nama_produk'),
		        'harga' => $this->input->post('harga'),
		        'kategori_id' => $this->input->post('kategori_id'),
		        'status_id' => $this->input->post('status_id')
	      	);

			header("Content-Type: application/json");
			$data["id_barang"] = $this->barang_model->add_barang($data);

			$data["cek_validasi"] = 1;
			echo json_encode($data);

		} else {

			$data["cek_validasi"] = 0;
			$data["error"] = $this->form_validation->error_array();
			header("Content-Type: application/json");
			echo json_encode($data);

		}

	}

	public function halaman_update_barang($id)
	{

		$data['kategori'] = $this->all_model->getall('kategori', 'id_kategori');
		$data['status'] = $this->all_model->getall('status', 'id_status');

		$data['viewoptions']['page'] = "update-barang";
		$data['viewoptions']['title'] = "Pratical Test Maxy Academy";
		$data['heading'] = "Update Barang";

		$this->load->model('barang_model');
		$res = $this->barang_model->get($id);
		$data['content'] = $res;

		if ($res != 0)
		{
			$this->load->view('general/header',$data);
	    	$this->load->view('content/update-barang',$data);
	    	$this->load->view('content/script/update-barang-script',$data);
	    	$this->load->view('general/footer',$data);
		}
		else
		{
			echo "<script type = 'text/javascript'>
                alert('Barangan Dengan ID Produk ini tidak tersedia');
                window.location.href = '" . base_url() . "'
            </script>";
			//redirect(base_url());
		}

	}

	public function update_barang()
	{

		header('Access-Control-Allow-Origin: *');
		$this->load->model('barang_model');
		$data["cek_validasi"] = 0;

		$this->load->library('form_validation');
		/* $this->form_validation->set_rules('id_produk', 'id_produk', 'required',
        array('required' => 'ID Produk tidak boleh kosong')); */
		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'required',
        array('required' => 'Nama Produk tidak boleh kosong'));
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric',
        array('required' => 'Harga tidak boleh kosong', 'numeric' => 'Harga hanya boleh disi angka'));

		if ($this->form_validation->run() === TRUE)
		{

			$data = array(
				'nama_produk' => $this->input->post('nama_produk'),
		        'harga' => $this->input->post('harga'),
		        'kategori_id' => $this->input->post('kategori_id'),
		        'status_id' => $this->input->post('status_id')
	      	);
	      	$id_produk = $this->input->post('id_produk');

			header("Content-Type: application/json");
			$data["id_barang"] = $this->barang_model->update_barang($data, $id_produk);

			$data["cek_validasi"] = 1;
			echo json_encode($data);

		} else {

			$data["cek_validasi"] = 0;
			$data["error"] = $this->form_validation->error_array();
			header("Content-Type: application/json");
			echo json_encode($data);

		}

	}

	public function delete_barang()
	{

		header('Access-Control-Allow-Origin: *');
		$this->load->model('barang_model');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'required');

		if ($this->form_validation->run() === TRUE)
		{

	      	$id_produk = $this->input->post('id');

			header("Content-Type: application/json");
			$data["id_barang"] = $this->barang_model->delete_barang($id_produk);
			echo json_encode($data);

		} else {
			http_response_code(404);
			die();
		}

	}

	public function delete_barang_2()
	{

		header('Access-Control-Allow-Origin: *');
		$this->load->model('barang_model');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'required');

		if ($this->form_validation->run() === TRUE)
		{

	      	$id_produk = $this->input->post('id');

			header("Content-Type: application/json");
			$data["id_barang"] = $this->barang_model->delete_barang_2($id_produk);
			echo json_encode($data);

		} else {
			http_response_code(404);
			die();
		}

	}

}
