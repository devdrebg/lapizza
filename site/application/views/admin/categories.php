<div id="newcategorie" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Cadastrar Nova Categoria</h2>
			</div>
			<div class="modal-body">
				<?php echo form_open('categories/insert'); ?>
					<div class="form-group">
						<input type="text" name="categoriesinsert[name]" placeholder="Nome da categoria" class="form-control" required>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div id="updatecategorie" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Alterar Categoria <span id="categorianame"></span></h2>
			</div>
			<div class="modal-body">
				<?php echo form_open('categories/update'); ?>
					<div class="form-group">
						<input type="text" name="categoriesupdate[name]" placeholder="Nome da categoria" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="hidden" name="categoriesupdate[id]" value="">
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
			<p><a href="#" data-toggle="modal" data-target="#newcategorie" class="btn btn-primary">Cadastrar Nova Categoria</a></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Nome</th>
					<th>Editar</th>
					<!-- <th>Excluir</th> -->
				</thead>
 				<tbody><?php foreach($categories as $categorie) : ?>
					<tr>
						<td><?php echo $categorie['id']; ?></td>
						<td><?php echo $categorie['name']; ?></td>
						<td><a href="#" data-toggle="modal" data-target="#updatecategorie" data-categorie-id="<?php echo $categorie['id']; ?>" class="btn btn-primary link-updatecategorie">Editar</a></td>
						<!-- <td><a href="<?php echo base_url(); ?>categories/delete/<?php echo $categorie['id']; ?>" class="btn btn-danger">Excluir</a></td> -->
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>