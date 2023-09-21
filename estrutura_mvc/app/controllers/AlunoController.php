<?php 
namespace app\Controllers;
use app\core\Controller;

class AlunoController Extends Controller{ 

	public function index(){ 
	echo "ALUNO";
	
	}
	public function listar(){ 
		echo "lista de Alunos";
	}
	public function salvar($nome, $idade, $altura=null) { 
		echo "$nome Salvado e ele tem $idade anos";	
		if($altura){
			echo "E sua altura eh de $altura";
		}
	}
} 


?> 