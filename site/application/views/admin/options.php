<div id="updateoption" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Alterar Opções de Loja</h2>
			</div>
			<div class="modal-body">
				<?php echo form_open('options/update'); ?>
					<div class="form-group">
						<label>Taxa de Entrega:</label>
						<input type="text" name="optionsupdate[tax_vat]" placeholder="Preço" class="money form-control" required>
					</div>

					<div class="form-group">
						<select name="optionsupdate[store_status]" class="form-control" required>
							<option selected disabled>Loja Online?</option>
							<option value="0">Não</option>
							<option value="1">Sim</option>
						</select>
					</div>

					<div class="form-group">
						<input type="hidden" name="optionsupdate[id]" value="">
						<button type="submit" class="btn btn-default tcc-button-submit">Alterar</button>
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
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Taxa de Entrega</th>
					<th>Loja Online</th>
					<th>Editar</th>
					<!-- <th>Excluir</th> -->
				</thead>
 				<tbody><?php foreach($options as $option) : ?>
					<tr>
						<td><?php echo $option['id']; ?></td>
						<td>R$ <?php echo number_format($option['tax_vat'], 2, ',', '.'); ?></td>
						<td><?php if($option['store_status']) : echo 'Online'; else: echo 'Offline'; endif; ?></td>
						<td><a href="#" data-toggle="modal" data-target="#updateoption" data-option-id="<?php echo $option['id']; ?>" class="btn btn-primary link-updateoption">Alterar</a></td>
						<!-- <td><a href="<?php echo base_url(); ?>categories/delete/<?php echo $categorie['id']; ?>" class="btn btn-danger">Excluir</a></td> -->
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
