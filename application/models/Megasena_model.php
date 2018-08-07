<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Megasena_model extends CI_Model {

	public function insereJogo( $jogo, $numero ) {
		$this->db->trans_begin();

		$this->db->insert('jogo', $jogo);
		$idJogo = $this->db->insert_id();

		foreach ($numero as $num) {
			$num = [
				'id_jogo' => $idJogo,
				'numero' => $num
			];
			$this->db->insert('numero', $num);
		}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function listaInfoJogo() {
		$this->db->select('COUNT(id_jogo) as qtd, COALESCE(SUM(valor),0) as valor', false);
		$this->db->from('jogo');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function listaInfoNumero() {
		$this->db->select('numero');
		$this->db->from('numero');
		$this->db->group_by('numero');
		$this->db->order_by('count(numero) desc', false);
		$this->db->limit(6);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function listaGanhadores($arrNum) {
		$this->db->select('id_jogo, count(numero) as numeros', false);
		$this->db->from('numero');
		$this->db->where_in('numero', $arrNum);
		$this->db->group_by('id_jogo');
		$this->db->having('numeros >= 6', null, false);

		$query = $this->db->get();

		return $query->result_array();
	}

}