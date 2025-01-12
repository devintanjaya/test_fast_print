<?php
class Barang_model extends CI_Model {

	public function generate_list_barang($start = 0, $limit = 0, $where = "")
    {
		
		$this->db->select('p.id_produk as id_produk, p.nama_produk as nama_produk, p.harga as harga, p.kategori_id as kategori_id, k.nama_kategori as nama_kategori, p.status_id as status_id, s.nama_status as nama_status');
		$this->db->from('produk p, kategori k, status s');
		if ($where != "") {
			$this->db->where($where);
		}
		$this->db->where("p.kategori_id = k.id_kategori");
		$this->db->where("p.status_id = s.id_status");
		$this->db->order_by('id_produk', 'DESC');

		$data = [];
		$tempdb = clone $this->db;
		$num_rows = $tempdb->count_all_results();
		$data['count'] = $num_rows;

		if ($start > 0 && $limit > 0) {
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$data['query'] =  $query->result_array();
		} else {
			$data['query'] =  0;
		}
		return $data;

    }

    public function get($id) {
		$query = $this->db->where('id_produk', $id)->get('produk', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function add_barang($data)
    {
      	$this->db->insert('produk', $data);
      	$id_barang = $this->db->insert_id();
      	return $id_barang;
    }

    public function update_barang($data, $id)
    {
      	$this->db->where('id_produk', $id);
      	$this->db->update('produk', $data);
    }

    public function delete_barang($id)
    {
    	$data = array(
    		'status_id' => "S0002"
    	);
      	$this->db->where('id_produk', $id);
      	$this->db->update('produk', $data);
    }

    public function delete_barang_2($id)
    {
      	$this->db->where('id_produk', $id);
      	$this->db->delete('produk');
    }

}
