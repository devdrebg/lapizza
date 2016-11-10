<div id="newcategorie" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Cadastrar Novo Endereço Postal</h2>
			</div>
			<div class="modal-body">
				<?php echo form_open('postalcodes/insert'); ?>
					<div class="form-group">
						<input type="text" name="postalcodesinsert[cep]" placeholder="CEP" class="form-control postalcode" required>
					</div>

					<div class="form-group">
						<input type="text" name="postalcodesinsert[location]" placeholder="Logradouro" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="postalcodesinsert[district]" placeholder="Bairro" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="postalcodesinsert[city]" placeholder="Cidade" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="postalcodesinsert[state]" placeholder="Estado" class="form-control" required>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center"><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p><a href="#" data-toggle="modal" data-target="#newcategorie" class="btn btn-primary">Cadastrar Nova Endereço</a></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>ID</th>
					<th>CEP</th>
					<th>Logradouro</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>Estado</th>
					<th>Excluir</th>
				</thead>
 				<tbody><?php foreach($postalcodes as $postalcode) : ?>
					<tr>
						<td><?php echo $postalcode['id']; ?></td>
						<td><?php echo $postalcode['cep']; ?></td>
						<td><?php echo $postalcode['location']; ?></td>
						<td><?php echo $postalcode['district']; ?></td>
						<td><?php echo $postalcode['city']; ?></td>
						<td><?php echo $postalcode['state']; ?></td>
						<!-- <td><a href="#" data-toggle="modal" data-target="#updatecategorie" data-categorie-id="<?php echo $categorie['id']; ?>" class="btn btn-primary link-updatecategorie">Editar</a></td> -->
						<td><a href="<?php echo base_url(); ?>postalcodes/delete/<?php echo $postalcode['id']; ?>" class="btn btn-danger">Excluir</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
