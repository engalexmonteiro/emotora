<?php
	// http://www.thiengo.com.br
	// Por: Vinícius Thiengo
	// Em: 25/11/2013
	// Versão: 1.0
	// servidor.php
	include('lib/nusoap.php');
	
	
	$servidor = new nusoap_server();
	
	
	$servidor->configureWSDL('urn:Servidor');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';
	
	
	function sendBlueCmd($cmdBlue){

		$port = fopen("/dev/rfcomm0", "w+");

		if($port != NULL){
			fprintf($port,$cmdBlue);
			fclose($port);
			return($cmdBlue);
		}
		else
			return("ERRORPORT");
	}
	
	
	$servidor->register(
		'sendBlueCmd',
		array('cmdBlue'=>'xsd:string'),
		array('retorno'=>'xsd:string'),
		'urn:Servidor.sendBlueCmd',
		'urn:Servidor.sendBlueCmd',
		'rpc',
		'encoded',
		'Apenas um exemplo utilizando o NuSOAP PHP.'
	);
	
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);
?>
