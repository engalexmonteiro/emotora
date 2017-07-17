<html>
 <head>
  <title>PHP Teste</title>
 </head>
 <body>
<?php
	$cmd = "/bin/bash sendCmd.sh 8OUAI1 rfcomm0";
	echo $cmd . "</br>";
        $result = system($cmd);
        echo $result . "</br>";
?>
 </body>
</html>
