<div id="newproduct" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Cadastrar Novo Produto</h2>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('products/insert'); ?>
					<div class="form-group">
						<input type="text" name="productsinsert[name]" placeholder="Nome do Produto" class="form-control" required>
					</div>

					<div class="form-group">
						<textarea name="productsinsert[description]" placeholder="Descrição do Produto" class="form-control" required></textarea>
					</div>

					<div class="form-group">
						<select name="productsinsert[idcategorie]" class="form-control" required>
							<option selected disabled>Categoria</option>
 							<?php foreach($categories as $categorie) : ?>
 								<option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<input type="text" name="productsinsert[price]" placeholder="Preço" class="form-control money" required>
					</div>

					<div class="form-group">
						<input type="file" name="image" placeholder="Imagem do Produto" required>
					</div>

					<div class="form-group">
						<input type="text" name="productsinsert[quantity]" placeholder="Quantidade em Estoque" class="form-control" required>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div id="updateproduct" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Alterar Produto <span id="produtoname"></span></h2>
			</div>
			<div class="modal-body">
				<?php echo form_open('products/update'); ?>
					<div class="form-group">
						<input type="text" name="productsupdate[name]" placeholder="Nome do Produto" class="form-control" required>
					</div>

					<div class="form-group">
						<textarea name="productsupdate[description]" placeholder="Descrição do Produto" class="form-control" required></textarea>
					</div>

					<div class="form-group">
						<select name="productsupdate[idcategorie]" class="form-control" required>
							<option selected disabled>Categoria</option>
 							<?php foreach($categories as $categorie) : ?>
 								<option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<input type="text" name="productsupdate[price]" placeholder="Preço" class="form-control money" required>
					</div>

					<div class="form-group">
						<input type="file" name="productsupdateimage" placeholder="Imagem do Produto" required>
					</div>

					<div class="form-group">
						<input type="text" name="productsupdate[quantity]" placeholder="Quantidade em Estoque" class="form-control" required>
					</div>
					<!-- <div class="form-group">
						<input type="text" name="productsupdate[name]" placeholder="Nome da Produto" class="form-control" required>
					</div> -->

					<div class="form-group">
						<input type="hidden" name="productsupdate[id]" value="">
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
			<p><a href="#" data-toggle="modal" data-target="#newproduct" class="btn btn-primary">Cadastrar Novo Produto</a></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Imagem</th>
					<th>Quantidade em Estoque</th>
					<th>Editar</th>
					<th>Excluir</th>
				</thead>
 				<tbody><?php foreach($products as $product) : ?>
					<tr>
						<td><?php echo $product['id']; ?></td>
						<td><?php echo $product['name']; ?></td>
						<td><?php echo $product['description']; ?></td>
						<td><?php echo $product['id_categorie']; ?></td>
						<td><img src="<?php echo base_url() . $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-responsive img-product"></td>
						<td><?php echo $product['quantity']; ?></td>
						<td><a href="#" data-toggle="modal" data-target="#updateproduct" data-product-id="<?php echo $product['id']; ?>" class="btn btn-primary link-updateproduct">Editar</a></td>
						<td><a href="<?php echo base_url(); ?>products/delete/<?php echo $product['id']; ?>" class="btn btn-danger">Excluir</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>