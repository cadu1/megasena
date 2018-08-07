<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Megasena extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('megasena_model');
	}

	public function index() {
		$this->template->set('menu', 'jogo');
		$this->template->load('template', 'megasena/jogo');
	}

	public function sorteio() {
		$arrInfo = $this->megasena_model->listaInfoJogo();

		$data = [
			'valor' => number_format($arrInfo[0]['valor'], 2, ',', '.'),
			'qtd' => $arrInfo[0]['qtd'],
			'numeros' => $this->megasena_model->listaInfoNumero()
		];

		$this->template->set('menu', 'sort');
		$this->template->load('template', 'megasena/sorteio', $data);
	}

	public function novo_sorteio() {
		$arrNum = [];
		while(true) {
			$num = rand(1,60);
			// Gera os 8 números aleatóriamente
			if( !array_search($num, $arrNum) ) {
				$arrNum[] = $num;
			}
			if( count($arrNum) == 8 ) {
				break;
			}
		}

		$data = [
			'num_sort' => $arrNum,
			'ganhadores' => $this->megasena_model->listaGanhadores($arrNum)
		];

		$this->load->view('megasena/ganhadores', $data);
	}

	public function novo_jogo() {
		$json = [
			'msg' => '',
			'status' => 0
		];
		$numeros = $this->input->post('num');

		try{
			if( count($numeros) < 6 ) {
				throw new Exception('Ops! Você não marcou a quantidade mínima de números');
			} elseif( count($numeros) == 6 ) {
				$valor = 2.5;
			} elseif( count($numeros) == 7 ) {
				$valor = 8;
			} elseif( count($numeros) == 8 ) {
				$valor = 10;
			} else {
				throw new Exception('Ops! Você não marcou a quantidade mínima de números');
			}

			$jogo = ['valor' => $valor];

			$ret = $this->megasena_model->insereJogo($jogo, $numeros);
			if( !$ret ) {
				throw new Exception('Ops! Houve um problema ao registrar seu jogo, tente novamente!');
			}
			$json['status'] = 1;
		} catch(Exception $e) {
			$json['msg'] = $e->getMessage();
		}

		echo json_encode($json, JSON_NUMERIC_CHECK);
	}
}
