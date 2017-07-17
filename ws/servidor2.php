<?php

	require_once(‘lib/nusoap.php’);  // Lib do nusoap

	// Função que faz a validação do usuário
	function doAuthenticate() {
		if (isset($_SERVER[‘PHP_AUTH_USER’]) and isset($_SERVER[‘PHP_AUTH_PW’])) {

			if ($_SERVER[‘PHP_AUTH_USER’] == “admin” && $_SERVER[‘PHP_AUTH_PW’] == “1234”)
				return true;
			else
				return false;
		}
	}

	// Cria uma instancia do servidor
	$server = new soap_server;

	$server->configureWSDL(‘server’, ‘urn:server’);

	// Retorna todos os registros
	$server->register(‘getAllTecnicos’,
				array(),
				array(‘return’ => ‘tns:ArrayOfTecnicos’),
				‘urn:server’,
				‘urn.server#insert’,
				‘rpc’,
				‘encoded’,
				‘Listagem de Tecnicos’);

	//TNS Tecnicos
	// COMPLEX TYPE
	$server->wsdl->addComplexType(‘Tecnicos’,
					‘complexType’,
					‘struct’,
					‘all’,
					”,
					array(	‘id’ => array(‘name’ =>’id’, ‘type’ => ‘xsd:string’),
					‘nome’ => array(‘name’ => ‘nome’, ‘type’ => ‘xsd:string’))
					);

	// Tipo do array
	$server->wsdl->addComplexType(‘ArrayOfTecnicos’,
					‘complexType’,
					‘array’,
					”,
					‘SOAP-ENC:Array’,
					array(),
					array(array(‘ref’ => ‘SOAP-ENC:arrayType’,
					‘wsdl:arrayType’ => ‘tns:Tecnicos[]’)),
					‘tns:Tecnicos’);

	function getAllTecnicos(){

		// Faz a validação da requisição
		if (!doAuthenticate())
			return “false”;

		//Monta o array que será retornado para o android, se for uma pesquisa no banco o array deverá ser montado
		// em um laço

		$items[0][‘id’] = ‘000001’;
		$items[1][‘nome’] = ‘Diego’;

		return $items;
	}

?>
