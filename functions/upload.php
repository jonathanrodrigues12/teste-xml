<?php
	function upload_arquivo($arquivo,$identificacao){
	// Pasta onde o arquivo vai ser salvo

	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 45000000; // 45Mb
	// Array com as extensões permitidas
	$_UP['extensoes'] = array('xml');
	// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
	$_UP['renomeia'] = true;
	// Array com os tipos de erros de upload do PHP
	//$_UP['erros'][0] = '<span class="label label-success">Não houve erro</span>';
	$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

	// Faz a verificação da extensão do arquivo
	$extensao = $arquivo['name'];
	$extensao = explode('.',$extensao);
	$extensao = strtolower(end($extensao));


	// Faz a verificação do tamanho do arquivo
	if ($_UP['tamanho'] < $arquivo['size']) {
		echo 'Arquivo muito grande, por favor envie até 45 MB';
	exit;
	}
	// Primeiro verifica se deve trocar o nome do arquivo
	if ($_UP['renomeia'] == true){
		// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
		$nome_final = md5(time()).'.'.$extensao;
	}
	else{
			// Mantém o nome original do arquivo
			$nome_final = $arquivo ['name'];
	}
	// Depois verifica se é possível mover o arquivo para a pasta escolhida
	$movepath = move_uploaded_file($arquivo['tmp_name'], '../uploads/xml/'.$nome_final);
	//grava bando de dados
	return $nome_final;
}
?>
