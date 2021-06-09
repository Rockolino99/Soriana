<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<?php
		if(isset($_SESSION['idUsuario'])) {
			$mod = (isset($_GET['mod'])) ? $_GET['mod'] : "caja";
			if($mod == 'admin' && $_SESSION['idArea'] != 4) $mod = "caja";
			if($mod == 'seguridad' && $_SESSION['idArea'] != 3) $mod = "caja";
			switch ($mod) {
				case "caja":
					$seccion = "CAJA";
				break;
				case "admin":
					$seccion = "ADMINISTRACIÓN";
				break; 
				case "seguridad":
					$seccion = "SEGURIDAD";
				break;
			}
		}
	?>
	<head>
		<title>SORIANA</title>
		<link rel="shortcut icon" href="application/assets/img/icons/favicon.ico" type="image/x-icon">
		<meta charset='utf-8' />
	</head>

	<header>
		<!-- Bootstrap v4.0.0 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		
		<!-- LESS -->	
		<script src="//cdn.jsdelivr.net/npm/less@3.13"></script>
		<link rel="stylesheet/less" type="text/css" href="application/assets/css/styles.less"/>

		<!-- CSS -->	
		<link rel="stylesheet" type="text/css" href="application/assets/css/styles.css"/>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/f8978717f6.js" crossorigin="anonymous"></script>

  		<!-- DataTable JS -->
  		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

		<!-- Toastr -->
		<link rel="stylesheet" href="./application/assets/pluggins/toastr/toastr.css">
		<script src="./application/assets/pluggins/toastr/toastr.js"></script>


	</header>

	<body>
		<?php if(isset($_SESSION['idUsuario'])) {  ?>
		<div class="header">
		  <a href="#" id="menu-action">
		    <i class="fa fa-bars"></i>
		    <span>Ocultar</span>
		  </a>
		  <div class="logo">
			  <span>soriana  <i class="fas fa-chevron-right" style="color: white;"></i>  <?php echo $seccion; ?></span>
			  <span><?php echo $_SESSION['nombre']; ?></span>
		  </div>
		</div>
		<div class="sidebar">
		  <ul>
		    <li><a href="index.php?mod=caja"><i class="fa fa-user"></i><span>Caja</span></a></li>
			<?php if($_SESSION['idArea'] == 3) { ?>
			<li><a href="index.php?mod=seguridad"><i class="fas fa-shield-alt"></i><span>Seguridad</span></a></li>
			<?php }
			if($_SESSION['idArea'] == 4) { ?>
			<li><a href="index.php?mod=admin"><i class="fa fa-clipboard"></i><span>Administración</span></a></li>
			<?php } ?>
			<li><a href="index.php?mod=logout"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a></li>
		    </ul>
		</div>

		<!-- Content -->
		<div class="main">
			<?php
		        $mod = (isset($_GET['mod'])) ? $_GET['mod'] : "caja";
				if($mod == 'admin' && $_SESSION['idArea'] != 4) $mod = "caja";
				if($mod == 'seguridad' && $_SESSION['idArea'] != 3) $mod = "caja";
		          switch ($mod) {
		              case "caja":
		                  include_once('application/views/view_caja.php');
		              break;
		              case "admin":
		                  include('application/views/view_administracion.php');
		              break; 
		              case "seguridad":
		                  include('application/views/view_seguridad.php');
		              break;
		              case "logout":
		                  include('application/views/view_logout.php');
		              break;
		          }
		      ?>
		</div>
		<?php } else include('application/login/index.php'); ?>
	</body>
</html>

<script type="text/javascript" src="application/assets/js/index.js"></script>


