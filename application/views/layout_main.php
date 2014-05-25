<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo (!empty($_title_for_layout_))?htmlentities($_title_for_layout_)." - ":'';?> AvizorApp</title>

	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/handlebars.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">AvizorApp</a>
		</div>
		<div class="collapse navbar-collapse">
			<!--<ul class="nav navbar-nav">
				<li class="active"><a href="/">Home</a></li>
			</ul>-->

			<ul class="nav navbar-nav navbar-right">
				<?php if($_is_logged_in_): ?>
				
					<?php if($this->session->userdata('user')->type=='subscriber'): ?>	
						<li><a href="/subscriber/edit"><i class="fa fa-user fa-lg"></i>
						<?php echo htmlentities($this->session->userdata('user')->username); ?></a></li>
					<?php else: ?>
						<li><a href="/ong/edit"><i class="fa fa-user fa-lg"></i>
						<?php echo htmlentities($this->session->userdata('user')->username); ?></a></li>
						<li><a href="/alert/edit"><i class="fa fa-plus fa-lg"></i> Nueva Alerta</a></li>
					<?php endif;?>
					
				<li><a href="/signout"><i class="fa fa-sign-out fa-lg"></i>
					Cerrar Sesión
				</a></li>
				<?php else: ?>
				<li><a href="/signin"><i class="fa fa-twitter fa-lg"></i>
					Inicia sesión con Twitter
				</a></li>
				<?php endif;?>
			</ul>
		</div>
	</div>
</div><!--/.nav-collapse -->

<?php if($_flash_):?>
<div class="container">
	<div class="alert <?php echo $_flash_['class']?> alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong><?php echo $_flash_['label']?>:</strong> <?php echo htmlentities($_flash_['message'])?>
	</div>
</div>
<?php endif; ?>

<?php echo $_content_for_layout_ ?>

</body>
</html>