<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$query = $this->db->get('agenda');
		return $query->result();
	}

	public function listing_all()
	{
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->order_by('tanggal_mulai', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_paging($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama_agenda', $keyword);
			$this->db->or_like('lokasi', $keyword);
		}
		$query = $this->db->get('agenda', $limit, $start);
		return $query->result();
	}

	public function count_all_agenda()
	{
		return $this->db->get('agenda')->num_rows();
	}

	public function listing_home()
	{
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->order_by('tanggal_mulai', 'desc');
		$this->db->limit(2);
		// $query = "SELECT * FROM agenda LIMIT 2";
		$query = $this->db->get();
		return $query->result();
	}

	public function add($data)
	{
		$this->db->set('id_agenda', 'UUID()', FALSE);
		$this->db->insert('agenda', $data);
	}

	public function update($data, $where)
	{
		$this->db->where('id_agenda', $where);
		$this->db->update('agenda', $data);
	}

	public function deleteAgenda($where, $table)
	{
		$this->db->where('id_agenda', $where);
		$this->db->delete($table);
	}

	public function setComingEvent()
	{
		$this->db->query("UPDATE agenda SET status ='akan datang'");
	}

	public function setRunningEvent()
	{
		$this->db->query("UPDATE agenda SET status ='sedang berlangsung'");
	}

	public function setEndEvent()
	{
		$this->db->query("UPDATE agenda SET status ='telah usai'");
	}
}


/* Created by : @BerthoErizal 2017, @DimasNugrohoPutro 2018 */
/* Support by : @SulthanSHP 2018, @RajaAziyan 2018 */
/* From Divisi : Web Programming */