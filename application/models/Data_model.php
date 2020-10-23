<?php

class Data_model extends CI_Model
{

	function SelectData($params)
	{
		$this->db = $this->load->database($params['db'], true);
		$this->db->select($params['select']);
		$this->db->from($params['table']);
		if (!empty($params['join'])) {
			foreach ($params['join'] as $key => $value) {
				$this->db->join($value['table'], $value['condition'], $value['type']);
			}
		}
		if (!empty($params['where'])) {
			$this->db->where($params['where']);
		}
		if (!empty($params['order'])) {
			foreach ($params['order'] as $key => $value) {
				$this->db->order_by($value['kolom'], $value['sort']);
			}
		}
		if (!empty($params['paging'])) {
			if ($params['paging']['per_page'] > 0) {
				$this->db->limit($params['paging']['per_page']);
				$this->db->offset($params['paging']['offset']);
			}
		}
		if (!empty($params['group'])) {
			$this->db->group_by($params['group']);
		}
		$query = $this->db->get();
		return $query;
	}

	function UpdateData($params)
	{
		$this->db = $this->load->database($params['db'], true);
		$this->db->set($params['set']);
		$this->db->where($params['where']);
		return $this->db->update($params['table']);
	}

	function DeleteData($params)
	{
		$this->db = $this->load->database($params['db'], true);
		$this->db->where($params['where']);
		return $this->db->delete($params['table']);
	}

	function InsertData($params)
	{
		$this->db = $this->load->database($params['db'], true);
		$this->db->set($params['set']);
		return $this->db->insert($params['table']);
	}
	
}
