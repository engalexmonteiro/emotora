<html>
 <head>
  <title>PHP Teste</title>
 </head>
 <body>
<?php
	echo "Abrindo porta</br>";
	$port = fopen("/dev/rfcomm0", "w+");

	if($port != NULL){
		echo "Enviando comando</br>";
		$command = $_GET["cmd"]; 
		fprintf($port,"8OUAI1");
		echo "Comando enviado: " . $command . "</br>" ;
		fclose($port);
	}
	else
	   echo "Erro ao abrir a porta";
?>
 </body>
</html>



