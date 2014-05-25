
<div class="container">
	<?php if($is_owner): ?>
		<div class="row">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php if($alert->status =='new'): ?>
							<div class="navbar-brand">Alerta Nueva</div>
						<?php else: ?>
							<div class="navbar-brand">Editar Alerta</div>
						<?php endif;?>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form class="navbar-form navbar-right text-right" style="text-align:right">
							<div class="form-group">
								<a class="btn btn-default" href="/alert/edit/<?php echo $alert->alert_id?>"><i class="fa fa-edit"></i> Editar</a>
								<?php if($alert->status =='new'): ?>
									<a class="btn btn-default btn-primary" href="#"><i class="fa fa-share"></i> Enviar Alerta</a>
								<?php endif; ?>
							</div>
						</form> 	
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-md-6">
			<h1><?php echo htmlentities($alert->title) ?></h1>
		</div>
		<div class="col-md-6 text-right" style="margin-top:20px">
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_googleplus_large' displayText='Google +'></span>
			<span class='st_email_large' displayText='Email'></span>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
		<?php echo nl2br(htmlentities($alert->content))?>
		</div>
	</div>
	<hr/>
	<div class="row text-center">
		<div class="col-md-12">
			<a href="<?php echo htmlentities($alert->action_link)?>" class="btn btn-block btn-primary btn-lg" role="button">¡Asiste al evento!</a>
		</div>
	</div>
</div>

<script src="/js/alert_view.js"></script>
<?php if($is_owner): ?>
	<script src="/js/alert_view_edit.js"></script>
<?php endif; ?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "50c51b8e-16d7-4dd5-acd0-963f52dc5594", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>