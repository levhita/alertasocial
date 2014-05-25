<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="edit_user_form">
				<?php if ($alert->alert_id=='0'): ?>
					<h1>Crear Alerta</h1>
				<?php else: ?>
					<h1>Editar Alerta</h1>
				<?php endif; ?>
				<div class="form-group">
					<label for="title">Título:</label>
					<input type="text" class="form-control" id="title" placeholder="AconteceMesta" value="<?php echo htmlspecialchars($alert->title)?>"/>
				</div>
				<div class="form-group">
					<label for="content">Contenido:</label>
					<textarea rows="8" class="form-control" placeholder="Descripción del acontecimiento o actividad" id="content"><?php echo htmlspecialchars($alert->content)?></textarea>
				</div>
				<div class="form-group">
					<label for="action_link">Enlace:</label>
					<input type="text" class="form-control" id="action_link" placeholder="Enlace a un evento en Facebook o Eventbrite" value="<?php echo htmlspecialchars($alert->action_link)?>"/>
				</div>
				<input type="hidden" id="alert_id" value="<?php echo $alert->alert_id?>"/>
				<div class="form-group">
					<button id="saveAlertButton" type="button" class="btn btn-default btn-primary"><i class="fa fa-eye"></i> Previsualizar</button>	
				</div>
			</form>
		</div>
	</div>
</div>

<script src="/js/alert_edit.js"></script>