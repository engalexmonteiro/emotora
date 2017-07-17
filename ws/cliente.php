<?php
	// http://www.thiengo.com.br
	// Por: Vinícius Thiengo
	// Em: 25/11/2013
	// Versão: 1.0
	// cliente.php
	include('lib/nusoap.php');
	
	
	$cliente = new nusoap_client('http://localhost/servidor.php?wsdl');
	
	
	$parametros = array('cmdBlue'=>'8OUAI1');						
		
	$resultado = $cliente->call('sendBlueCmd', $parametros);
	
	echo utf8_encode($resultado);
	
?>
