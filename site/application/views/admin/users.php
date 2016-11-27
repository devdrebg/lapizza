<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center"><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Foto</th>
							<th>E-mail</th>
							<th>Telefone</th>
							<th>Status</th>
							<th>Ativar / Desativar</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $user) : ?>
							<tr>
								<td><?php echo $user['id']; ?></td>
								<td><?php echo $user['name']; ?></td>
								<td><div class="profile-picture"<?php if($user['picture']) : ?> style="background-image: url(<?php echo base_url() . $user['picture']; ?>) !important;"<?php endif; ?>></div></td>
								<td><?php echo $user['email']; ?></td>
								<td><?php echo $user['phone']; ?></td>
								<td><?php echo ($user['status']) ? 'Ativo' : 'Inativo'; ?></td>
								<td>
									<?php echo form_open_multipart('user/changestatus'); ?>
										<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
										<input type="hidden" name="status" value="<?php echo $user['status']; ?>">
										<input type="hidden" name="name" value="<?php echo $user['name']; ?>">
										<button type="submit" class="btn <?php echo ($user['status']) ? 'btn-danger' : 'btn-success'; ?>"><?php echo ($user['status']) ? 'Desativar' : 'Ativar'; ?></button>
									<?php echo form_close(); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>