<html>
 <head>
  <title>PHP Teste</title>
 </head>
 <body>
<?php
        $cmd = "hcitool scan";
        $result = system($cmd);
	echo $result;

/*	$list = explode("\r", $result);*/

/*	foreach ($list as $dev)
	    echo $dev . "</br>";*/
?>
 </body>
</html>
