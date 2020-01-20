<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_set_role_adm extends CI_Model
{
	// declare array variable to search datatable
	var $column_search = array(
		'tbl_level_user.id_level_user',
		'tbl_level_user.nama_level_user',
		'tbl_level_user.keterangan_level_user'
	);

	var $column_order = array(
		'tbl_level_user.id_level_user',
		'tbl_level_user.nama_level_user',
		'tbl_level_user.keterangan_level_user'
	);

	var $order = array('tbl_level_user.nama_level_user' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		//alternative load library from config
		$this->load->database();
	}

	//for all data
	private function _get_data_role_query($term='') //term is value of $_REQUEST['search']
	{
		$column = array(
			'tbl_level_user.id_level_user',
			'tbl_level_user.nama_level_user',
			'tbl_level_user.keterangan_level_user',
			null,
		);

		$this->db->select('
			tbl_level_user.*
		');

		$this->db->from('tbl_level_user');
		$i = 0;
		// loop column 
		foreach ($this->column_search as $item) 
		{
			// if datatable send POST for search
			if($_POST['search']['value']) 
			{
				// first loop
				if($i===0) 
				{
					// open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				//last loop
				if(count($this->column_search) - 1 == $i) 
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatable_role()
	{
		$term = $_REQUEST['search']['value'];
		$this->_get_data_role_query($term);
		if($_REQUEST['length'] != -1)
		$this->db->limit($_REQUEST['length'], $_REQUEST['start']);

		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$term = $_REQUEST['search']['value'];
		$this->_get_data_role_query($term);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tbl_level_user');
		return $this->db->count_all_results();
	}
	//end datatable query
	
	public function update_data_role($where, $input, $table)
	{
		$this->db->update($table, $input, $where);
	}

	public function delete_data_role($where, $table)
	{
		$this->db->delete($table, $where);
	}

	public function get_data($where, $table)
	{
		$this->db->where($where);
		return $this->db->get($table)->row_array();
	}

	function show_data_menu($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){
		
		$this->db->select("*");		
		if($where){
			$this->db->where($where);
		}		
		if($like){
			$this->db->like($like);
		}		
		if($order_by){
			$this->db->order_by($order_by);
		}			
		return $this->db->get("tbl_menu",$limit,$fromLimit)->result();
	}

	function get_data_akses($where){
		$this->db->select("*");		
		$this->db->where($where);	
		return $this->db->get("tbl_hak_akses")->row();
	}
	
}