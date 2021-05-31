<!DOCTYPE html>
<html>

	<head>
		<title>SORIANA</title>
		<link rel="shortcut icon" href="application/assets/img/icons/favicon.png" type="image/x-icon">
		<meta charset='utf-8' />
	</head>

	<header>
		<!-- Bootstrap v3.3.7 -->
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
  		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

  		<!-- Vue JS -->
		<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
		<script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.0/vue.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.5"></script>

  		<!-- Alertify -->
		<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertif
		yjs@1.13.1/build/css/alertify.min.css"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

		<!-- Select2 -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	</header>

	<body>
		<div class="header">
		  <a href="#" id="menu-action">
		    <i class="fa fa-bars"></i>
		    <span>Ocultar</span>
		  </a>
		  <div class="logo">
		    soriana
		  </div>
		</div>
		<div class="sidebar">
		  <ul>
		    <li><a href="index.php?mod=caja"><i class="fa fa-user"></i><span>Caja</span></a></li>
			<li><a href="index.php?mod=admin"><i class="fa fa-clipboard"></i><span>Administración</span></a></li>
		    <li><a href="index.php?mod=mant"><i class="fa fa-tools"></i><span>Mantenimiento</span></a></li>
		    <li><a href="index.php?mod=seguridad"><i class="fas fa-shield-alt"></i><span>Seguridad</span></a></li>
			<li><a href="index.php?mod=logout"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a></li>
		    </ul>
		</div>

		<!-- Content -->
		<div class="main">
			<?php
		        $mod = (isset($_GET['mod'])) ? $_GET['mod'] : "caja";
		          switch ($mod) {
		              case "caja":
		                  include_once('application/views/view_caja.php');
		              break;
		              case "admin":
		                  include('application/views/view_administracion.php');
		              break; 
		              case "mant":
		                  include('application/views/view_mantenimiento.php');
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
	</body>
</html>

<script type="text/javascript" src="application/assets/js/index.js"></script>


