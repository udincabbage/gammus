<?php
include "includes/config.php";
session_start();
if(!isset($_SESSION['nama_lengkap'])){
	echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS Gateway : Gammu Services developed by nKIT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet"><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="header">
 <img src="images/header.png" height="90%">  
  </div>
	<nav class="navbar navbar-inverse navbar-static-top">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">SMS</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
		<!--	<li><a href="index.php">Home</a></li> -->
			<!-- <li><a href="nilai.php">Nilai</a></li> 
			<li><a class="dropdown-toggle" data-toggle="dropdown" href="inbox.php"> Data Inbox</a>
			-->
			
			<li><a href="hafiz.php">Hafiz</a> </li>
			<li><a href="broadcast.php">Broadcast SMS</a> </li>
			<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">SMS Data</a>
			<ul class="dropdown-menu">
			<li><a href="services.php">Services</a></li>
			<li><a href="send.php">Kirim SMS</a></li>
			<li><a href="inbox.php">Inbox<div id="success"></div></a> </li>
			<li><a href="outbox.php">Outbox</a> </li>
			<li><a href="sentbox.php">Sentbox</a> </li>
			</ul>
			</li>
			<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data</a>
			<ul class="dropdown-menu"> 
			<li><a href="wali.php">Wali Santri</a> </li> 
			<li><a href="kelas_santri.php">Santri Kelas</a> </li>
			<li><a href="santri.php">Santri</a> </li>
			<li><a href="kelas.php">Kelas</a> </li>
			<li><a href="tahun_akademik.php">Tahun Akademik</a> 
			<li><a href="hafalan.php">Hafalan</a> </li></li>
			<li><a href="pesantren.php">Pondok</a> </li></li>
			</ul>
			</li>  
			 
			<!-- <li><a href="#">Laporan</a></li> -->
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="profil.php"><?php echo $_SESSION['nama_lengkap'] ?></a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="profil.php">Profil</a></li>
				<li><a href="#user.php">Manajemen Pengguna</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="logout.php">Logout</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
  
    <div class="container isi">