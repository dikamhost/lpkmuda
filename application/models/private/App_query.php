<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App_query extends CI_Model
{
	var $_table = null, $_select = "*", $_where = null, $_join = [], $_group = null, $_search = [], $_order = [];
	var $_limit = null, $_offset = null, $_where_or = null, $_where_in = null, $_like = null;
	var $_field = [];

	public function _save($save_data = null)
	{
		$return	= false;
		if ($save_data) {
			$return	= false;
			$this->_table	= (isset($save_data["table"])) ? $save_data["table"] : null;
			$this->_field	= (isset($save_data["field"])) ? $save_data["field"] : [];
			if ($this->_table && (is_array($this->_field) && count($this->_field) > 0)) {
				$query	= $this->db->insert($this->_table, $this->_field);
				if ($query) {
					$return	= true;
				}
			}
		}
		return $return;
	}

	public function _batch($save_data = null)
	{
		$return	= false;
		if ($save_data) {
			$return	= false;
			$this->_table	= (isset($save_data["table"])) ? $save_data["table"] : null;
			$this->_field	= (isset($save_data["field"])) ? $save_data["field"] : [];
			if ($this->_table && (is_array($this->_field) && count($this->_field) > 0)) {
				$query	= $this->db->insert_batch($this->_table, $this->_field);
				if ($query) {
					$return	= true;
				}
			}
		}
		return $return;
	}

	public function _update($update_data = null)
	{
		if ($update_data) {
			$return	= false;
			$this->_table	= (isset($update_data["table"])) ? $update_data["table"] : null;
			$this->_field	= (isset($update_data["field"])) ? $update_data["field"] : [];
			$this->_where	= (isset($update_data["where"])) ? $update_data["where"] : null;
			if ($this->_table && (is_array($this->_field) && count($this->_field) > 0) && $this->_where) {
				$return	= false;
				$query	= $this->db->update($this->_table, $this->_field, $this->_where);
				if ($query) {
					$return	= true;
				}
			}
		}
		return $return;
	}

	public function _get($set_data)
	{
		$this->_select		= (isset($set_data["field"]))		? $set_data["field"]	: "*";
		$this->_table		= (isset($set_data["table"]))		? $set_data["table"]	: null;
		$this->_where		= (isset($set_data["where"]))		? $set_data["where"]	: null;
		$this->_where_or	= (isset($set_data["where_or"]))	? $set_data["where_or"]	: null;
		$this->_where_in	= (isset($set_data["where_in"]))	? $set_data["where_in"]	: null;
		$this->_not_in		= (isset($set_data["not_in"]))		? $set_data["not_in"]	: [];
		$this->_like		= (isset($set_data["like"]))		? $set_data["like"]		: null;
		$this->_join		= (isset($set_data["join"]))		? $set_data["join"]		: [];
		$this->_group		= (isset($set_data["group"]))		? $set_data["group"]	: null;
		$this->_order		= (isset($set_data["order"]))		? $set_data["order"]	: [];
		$this->_limit		= (isset($set_data["limit"]))		? $set_data["limit"]	: null;
		$this->_offset		= (isset($set_data["offset"]))		? $set_data["offset"]	: null;

		if ($this->_select) {
			$this->db->select($this->_select);
		}
		$this->db->from($this->_table);
		if ($this->_where) {
			$this->db->where($this->_where);
		}
		if ($this->_where_or) {
			$this->db->or_where($this->_where_or);
		}
		if ($this->_where_in) {
			$this->db->where_in($this->_where_in);
		}
		if (is_array($this->_not_in) && count($this->_not_in) > 0) {
			$this->db->where_not_in(key($this->_not_in), $this->_not_in[key($this->_not_in)]);
		}
		if ($this->_like) {
			$this->db->like($this->_like);
		}
		if (is_array($this->_join) && count($this->_join) > 0) {
			foreach ($this->_join as $j) {
				$this->db->join($j['join'], $j['on'], $j['type']);
			}
		}
		if ($this->_group) {
			$this->db->group_by($this->_group);
		}
		if (is_array($this->_order) && count($this->_order) > 0) {
			$this->db->order_by(key($this->_order), $this->_order[key($this->_order)]);
		}
		if ($this->_limit) {
			$this->db->limit($this->_limit);
		}
		if ($this->_offset) {
			$this->db->offset($this->_offset);
		}
		return $this->db->get();
	}

	private function _queryData()
	{
		$this->db->select($this->_select);
		if (is_array($this->_join) && count($this->_join) > 0) {
			foreach ($this->_join as $key) {
				$this->db->join($key["join"], $key["on"], $key["type"]);
			}
		}
		if ($this->_where) {
			$this->db->where($this->_where);
		}
		if ($this->_group) {
			$this->db->group_by($this->_group);
		}
		if (is_array($this->_search) && count($this->_search) > 0) {
			$i = 0;
			foreach ($this->_search as $item) {
				if ($_POST["search"]["value"]) {
					if ($i === 0) {
						$this->db->group_start();
						$this->db->like($item, $_POST["search"]["value"]);
					} else {
						$this->db->or_like($item, $_POST["search"]["value"]);
					}
					if (count($this->_search) - 1 == $i)
						$this->db->group_end();
				}
				$i++;
			}
		}
		if (is_array($this->_order)) {
			if (isset($_POST["order"])) {
				$this->db->order_by($this->_order[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
			} else if (isset($this->_order)) {
				$this->db->order_by(key($this->_order), $this->_order[key($this->_order)]);
			}
		}
	}

	public function getData_table($set_data)
	{
		$this->_table	= (isset($set_data["table"]))	? $set_data["table"]	: null;
		$this->_select	= (isset($set_data["select"]))	? $set_data["select"]	: "*";
		$this->_where	= (isset($set_data["where"]))	? $set_data["where"]	: null;
		$this->_join	= (isset($set_data["join"]))	? $set_data["join"]		: [];
		$this->_group	= (isset($set_data["group"]))	? $set_data["group"]	: null;
		$this->_search	= (isset($set_data["search"]))	? $set_data["search"]	: [];
		$this->_order	= (isset($set_data["order"]))	? $set_data["order"]	: [];
		$result	= null;
		if ($this->_table) {
			$this->_queryData();
			if ($_POST["length"] != -1) {
				$this->db->limit($_POST["length"], $_POST["start"]);
			}
			$result = $this->db->get($this->_table);
		}
		return $result;
	}

	public function getData_count($set_data)
	{
		$this->_table	= (isset($set_data["table"]))	? $set_data["table"]	: null;
		$this->_select	= (isset($set_data["select"]))	? $set_data["select"]	: "*";
		$this->_where	= (isset($set_data["where"]))	? $set_data["where"]	: null;
		$this->_join	= (isset($set_data["join"]))	? $set_data["join"]		: [];
		$this->_group	= (isset($set_data["group"]))	? $set_data["group"]	: null;
		$this->_search	= (isset($set_data["search"]))	? $set_data["search"]	: [];
		$this->_order	= (isset($set_data["order"]))	? $set_data["order"]	: [];
		$result	= 0;
		if ($this->_table) {
			$this->_queryData();
			$result = $this->db->count_all_results($this->_table);
		}
		return $result;
	}

	// contoh
	public function contoh() {
		$_query["search"]	= ["v_kecamatan, v_jenis"];
		$_query["table"]	= "statistik_produksi_pertanian a";
		$_query["select"]	= "
									a.id as v_id, b.kecamatan as v_kecamatan,
									a.tanam as v_tanam, a.panen as v_panen, a.tahun as v_tahun,
									c.tanaman as v_jenis, a.produksi as v_produksi, a.provitas as v_provitas";
		$_query["join"]		= [
			[
				"join"	=> "config_kecamatan b",
				"on"	=> "b.id = a.id_kecamatan",
				"type"	=> "left"
			],
			[
				"join"	=> "kategori_jenis_tanaman c",
				"on"	=> "c.id = a.id_tanaman",
				"type"	=> "left"
			]
		];
		$_query["order"]		= ["v_provitas"=>"DESC"];
		if (isset($_POST["order"])) {
			$_query["order"]		= [null,"v_kecamatan","v_jenis","v_tanam","v_panen","v_produksi","v_provitas"];
		}
		$_where = "";
		if (isset($_SESSION["data_tahun"]) && $_SESSION["data_tahun"] != "") {
			if ($_where == "") {
				$_where = "a.tahun = ".$_SESSION["data_tahun"];
			} else {
				$_where .= " and a.tahun = ".$_SESSION["data_tahun"];
			}
		}
		if (isset($_SESSION["data_kecamatan"]) && $_SESSION["data_kecamatan"] != "") {
			if ($_where == "") {
				$_where = "a.id_kecamatan = \"".$_SESSION["data_kecamatan"]."\"";
			} else {
				$_where .= " and a.id_kecamatan = \"".$_SESSION["data_kecamatan"]."\"";
			}
		}
		if (isset($_SESSION["data_jenis"]) && $_SESSION["data_jenis"] != "") {
			if ($_where == "") {
				$_where = "a.id_tanaman = \"".$_SESSION["data_jenis"]."\"";
			} else {
				$_where .= " and a.id_tanaman = \"".$_SESSION["data_jenis"]."\"";
			}
		}
		$_query["where"]	= $_where;
		$__query			= $this->app_query->getData_table($_query)->result_array();
		$nomor				= $_POST["start"];
		$output				= [];
		$count_data			= 0;
		if ($__query) {
			foreach ($__query as $key) {
				$nomor++;
				$out		= [];
				$out["v_nomor"]		= $nomor;
				$out["v_tahun"]		= $key["v_tahun"];
				$out["v_kecamatan"]	= $key["v_kecamatan"];
				$out["v_jenis"]		= $key["v_jenis"];
				$out["v_tanam"]		= number_format($key["v_tanam"],0,",",".");
				$out["v_panen"]		= number_format($key["v_panen"],0,",",".");
				$out["v_produksi"]	= number_format($key["v_produksi"],0,",",".");
				$out["v_provitas"]	= number_format($key["v_provitas"],0,",",".");
				$out["v_aksi"]		= "
										<a class=\"btn btn-danger btn-sm button-update\" data-id=\"".$key["v_id"]."\">
											<i class=\"fas fa-edit\"></i>Edit
										</a>";
				$output[]	= $out;
			}
			$count_data	= $this->app_query->getData_count($_query);
		}
		$return["draw"]				= $_POST["draw"];
		$return["recordsTotal"]		= count($output);
		$return["recordsFiltered"]	= $count_data;
		$return["data"]				= $output;
		echo json_encode($return, true);
	}
}
