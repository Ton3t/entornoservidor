<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>

	<style>

		header{
			position:relative;
			margin:auto;
			text-align:center;
			padding:5px;	
		}
		
		nav{
			position:relative;
			margin:auto;
			width:100%;
			height:auto;
			background:black;
		}

		nav ul{
			position:relative;
			margin:auto;
			width:50%;
			text-align: center;
		}

		nav ul li{
			display:inline-block;
			width:24%;
			line-height: 50px;
			list-style: none;
		}

		nav ul li a{
			color:white;
			text-decoration: none;
		}

		section{
			position:relative;
			padding:20px;
		}
	
	</style>
</head>
<body>

<header>
		LOGOTIPO
</header>

<?php 
	include "modules/navegacion.php";
?>

<section>

<?php

include "../app/controller.php";
$mvc = new MvcController();
$mvc -> enlacesPaginasController();

?>
	
</section>

</body>
</html>