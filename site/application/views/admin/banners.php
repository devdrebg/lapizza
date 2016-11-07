<div id="newbanner" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Cadastrar Novo Banner</h2>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('banners/insert'); ?>
					<div class="form-group">
						<input type="text" name="bannersinsert[title]" placeholder="Nome do Banner" class="form-control" required>
					</div>

					<div class="form-group">
						<img src="" alt="Imagem" title="Prévia da imagem do produto" id="insertbannerpreview" class="img-responsive center-block">
					</div>

					<div class="form-group">
						<input type="file" name="image" id="bannersinsertimage" placeholder="Imagem do Banner" required>
					</div>

					<div class="form-group">
						<input type="text" name="bannersinsert[link]" placeholder="Link do Banner" class="form-control" required>
					</div>

					<div class="form-group">
						<select name="bannersinsert[blank]" class="form-control" required>
							<option selected disabled>Abrir em Nova Guia</option>
							<option value="0">Não</option>
							<option value="1">Sim</option>
						</select>
					</div>

					<div class="form-group">
						<select name="bannersinsert[status]" class="form-control" required>
							<option selected disabled>Status</option>
							<option value="0">Inativo</option>
							<option value="1">Ativo</option>
						</select>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div id="updatebanner" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Alterar Banner <span id="bannertitle"></span></h2>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('products/update'); ?>
					<div class="form-group">
						<input type="text" name="bannersupdate[title]" placeholder="Nome do Banner" class="form-control" required>
					</div>

					<div class="form-group">
						<img src="" alt="Imagem" title="Prévia da imagem do banner" id="updatebannerpreview" class="img-responsive center-block">
					</div>

					<div class="form-group">
						<input type="file" name="image" id="bannersupdateimage" placeholder="Imagem do Banner" required>
					</div>

					<div class="form-group">
						<input type="text" name="bannersupdate[link]" placeholder="Link do Banner" class="form-control" required>
					</div>

					<div class="form-group">
						<select name="bannersupdate[blank]" id="bannersupdateblank" class="form-control" required>
							<option selected disabled>Abrir em Nova Guia</option>
							<option value="0">Não</option>
							<option value="1">Sim</option>
						</select>
					</div>

					<div class="form-group">
						<select name="bannersupdate[status]" class="form-control" required>
							<option selected disabled>Status</option>
							<option value="0">Inativo</option>
							<option value="1">Ativo</option>
						</select>
					</div>

					<div class="form-group">
						<input type="hidden" name="bannerssupdate[id]" value="">
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
			<p><a href="#" data-toggle="modal" data-target="#newbanner" class="btn btn-primary">Cadastrar Novo Banner</a></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th style="width: 20px">ID</th>
					<th style="width: 100px">Título</th>
					<th style="width: 100px">Imagem</th>
					<th style="width: 100px">Link</th>
					<th>Abrir em outra Aba?</th>
					<th style="width: 20px">Status</th>
					<th>Editar</th>
					<th>Excluir</th>
				</thead>
 				<tbody><?php foreach($banners as $banner) : ?>
					<tr>
						<td><?php echo $banner['id']; ?></td>
						<td><?php echo $banner['title']; ?></td>
						<td><img src="<?php echo base_url() . $banner['url']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive img-product"></td>
						<td><?php echo $banner['link']; ?></td>
						<td><?php echo $banner['blank']; ?></td>
						<td><?php echo $banner['status']; ?></td>
						<td><a href="#" data-toggle="modal" data-target="#updatebanner" data-banner-id="<?php echo $banner['id']; ?>" class="btn btn-primary link-updatebanner">Editar</a></td>
						<td><a href="<?php echo base_url(); ?>banner/delete/<?php echo $banner['id']; ?>" class="btn btn-danger">Excluir</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>