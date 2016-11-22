<div id="newaddress" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Cadastrar Novo Endereço</h2>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('address/insert'); ?>
					<div class="form-group">
						<input type="text" name="addressinsert[postalcode]" placeholder="CEP" class="form-control postalcode" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressinsert[address]" placeholder="Logradouro" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressinsert[number]" placeholder="Número" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressinsert[adjunct]" placeholder="Complemento" class="form-control">
					</div>

					<div class="form-group">
						<input type="text" name="addressinsert[district]" placeholder="Bairro" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressinsert[city]" placeholder="Cidade" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressinsert[state]" placeholder="Estado" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressinsert[name]" placeholder="Apelido para o Endereço" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="hidden" name="addressinsert[id_user]" value="<?php echo $userdata['id']; ?>">
						<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div id="updateaddress" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Alterar o Endereço <span id="addressname"></span></h2>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('address/update'); ?>
					<div class="form-group">
						<input type="text" name="addressupdate[postalcode]" placeholder="CEP" class="form-control postalcode" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressupdate[address]" placeholder="Logradouro" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressupdate[number]" placeholder="Número" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressupdate[adjunct]" placeholder="Complemento" class="form-control">
					</div>

					<div class="form-group">
						<input type="text" name="addressupdate[district]" placeholder="Bairro" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressupdate[city]" placeholder="Cidade" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressupdate[state]" placeholder="Estado" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="addressupdate[name]" placeholder="Apelido para o Endereço" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="hidden" name="addressupdate[id]" value="<?php echo $userdata['id']; ?>">
						<input type="hidden" name="addressupdate[id_user]" value="<?php echo $userdata['id']; ?>">
						<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div class="container internal">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<p><a href="#" data-toggle="modal" data-target="#newaddress" class="btn btn-primary">Cadastrar Novo Endereço</a></p>
		</div>
	</div>
	<?php if($addresses) : ?>		
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>CEP</th>
							<th>Logradouro</th>
							<th>Número</th>
							<th>Complemento</th>
							<th>Cidade</th>
							<th>Estado</th>
							<th>Apelido para o Endereço</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($addresses as $address) :  ?>
							<tr>
								<td><?php echo $address['postalcode']; ?></td>
								<td><?php echo $address['address']; ?></td>
								<td><?php echo $address['number']; ?></td>
								<td><?php echo $address['district']; ?></td>
								<td><?php echo $address['city']; ?></td>
								<td><?php echo $address['state']; ?></td>
								<td><?php echo $address['name']; ?></td>
								<td><a href="#" data-toggle="modal" data-target="#updateaddress" data-address-id="<?php echo $address['id']; ?>" class="btn btn-primary link-updateaddress">Editar</a></td>
								<td><a href="<?php echo base_url(); ?>address/delete/<?php echo $address['id']; ?>" class="btn btn-danger">Excluir</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-12">
				<p>Nenhum endereço cadastrado.</p>
			</div>
		</div>
	<?php endif; ?>
</div>