<!DOCTYPE php>
<html>
	<head>
		<meta charset="utf-8">
		<title>Header - Menu</title>
		<link href="../css/layout.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="../css/header.css" rel="stylesheet" type="text/css" media="screen"/>
	</head>

	<body>
		<table><td>
		<img src="../images/header/hl-0<?php echo(mt_rand(1,4)); ?>.png" height="200px">
		</td><td>
		<img src="../images/spacer.png" width="50px">
		</td><td>
		<menubtn><a href="../index.html" target="_parent">Home</a></menubtn> | <menubtn><a href="../newMovie.html" target="_parent">Neuer Film</a></menubtn>
		<h4>Persoenlicher Bereich</h4>
		<menubtn><a href="../profile.php" target="_parent">Profil</a></menubtn>
		</td>
	</body>
</html>