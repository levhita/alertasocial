<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="edit_user_form">
				<?php if ($user->new_user=='1'): ?>
					<h1>Bienvenido <?php echo htmlspecialchars(ucfirst($user->username));?></h1>
				<?php else: ?>
					<h1>Editar  <?php echo htmlspecialchars(ucfirst($user->username));?></h1>
				<?php endif; ?>
				<div class="form-group">
					<label for="firstname">Nombre:</label>
					<input type="text" class="form-control" id="firstname" placeholder="Observatorio Ciudadano, Colectivo Ecologista" value="<?php echo htmlspecialchars($user->firstname)?>"/>
				</div>
				<div class="form-group">
					<label for="email">Correo Eléctronico:</label>
					<input type="email" class="form-control" id="email" placeholder="tucorreo@asociacion.org" value="<?php echo htmlspecialchars($user->email)?>"/>
				</div>
				<div class="form-group">
					<label for="description">Descripcion:</label>
					<textarea class="form-control" placeholder="Descripción corta de lo que hace tu colectivo o asociación civil" id="description"><?php echo htmlspecialchars($user->description)?></textarea>
				</div>
				<input type="hidden" id="new_user" value="<?php echo $user->new_user;?>"/>
			
				<div class="form-group">
					<button id="saveUserButton" type="button" class="btn btn-default btn-primary"><i class="fa fa-save"></i> Guardar</button>	
				</div>
			</form>
		</div>
	</div>
</div>

<script src="/js/ong_edit.js"></script>