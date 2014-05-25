<div class="container">
	<form role="form" id="edit_user_form">
		<div class="row">

			<?php if ($user->new_user=='1'): ?>
				<h1>Bienvenido <?php echo htmlspecialchars(ucfirst($user->username));?></h1>
			<?php else: ?>
				<h1>Editar  <?php echo htmlspecialchars(ucfirst($user->username));?></h1>
			<?php endif; ?>
			<div class="form-group">
				<label for="firstname">Nombre(s)</label>
				<input type="text" class="form-control" id="firstname" placeholder="Juan" value="<?php echo htmlspecialchars($user->firstname)?>"/>
			</div>
			<div class="form-group">
				<label for="lastname">Apellidos</label>
				<input type="text" class="form-control" id="lastname" placeholder="Peréz Garcia"  value="<?php echo htmlspecialchars($user->lastname)?>"/>
			</div>
			<div class="form-group">
				<label for="email">Correo Eléctronico:</label> <span class="text-muted">*Si deseas recibir las alertas en tu correo electrónico.</span>
				<input type="email" class="form-control" id="email" placeholder="tucorreo@gmail.com" value="<?php echo htmlspecialchars($user->email)?>"/>
			</div>
			<input type="hidden" id="new_user" value="<?php echo $user->new_user;?>"/>
		</div>

		<div class="row">
			<h2>Selecciona las categorias que te interesan:</h2>
			<?php foreach($categories as $category):?>
				<button data-category_id="<?php echo $category['category_id'];?>" type="button" class="btn btn-default subscribeToCategoryButton<?php echo ($category["is_subscribed"])?" btn-primary":"";?>"><i class="fa <?php echo ($category["is_subscribed"])?'fa-minus':'fa-plus';?>"></i> <?php echo $category['name']; ?></button>	
			<?php endforeach; ?>
		</div>
		<hr/>
		<div class="row">
			<div class="form-group">
				<button id="saveUserButton" type="button" class="btn btn-default btn-primary"><i class="fa fa-save"></i> Guardar</button>	
			</div>
		</div>
	</form>
</div>

<script src="/js/subscriber_edit.js"></script>