<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<div class="divider"></div>
	
	<!-- User online -->
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo($_SESSION['usuario']); ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
	<!-- User online -->
	

	<ul class="nav menu">
		  <li class="active"><a href="../../index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
		<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
			<em class="fa fa-navicon">&nbsp;</em> Incidentes <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-1">
				<li><a class="" href="../principal_activos.php">
					<span class="fa fa-arrow-right">&nbsp;</span> Mis Casos
				</a></li>
				<li><a class="" href="../../cproblemas/principal_problemas.php">
					<span class="fa fa-arrow-right">&nbsp;</span> Mis Problemas
				</a></li>
		    </ul>
	    </li>
		<li><a href="../../cerrar_sesion.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
  </div><!--/.sidebar-->