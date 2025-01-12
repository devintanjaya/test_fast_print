<?php
class All_model extends CI_Model {

	public function getall($table, $order='id', $by='asc', $limit=0, $data=0) {
		if($limit != 0)
			$query = $this->db->order_by($order, $by)->get($table, $limit, $data);
		else
			$query = $this->db->order_by($order, $by)->get($table);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

}
