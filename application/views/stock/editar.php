<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-sm-8 offset-sm-2 col-12">
			<div class="card p-4">
				<h3><?php echo $produto['designacao']; ?></h3>
				<hr>
				<form action="<?php echo site_url("gestao/editarguardar/".$produto['id_produto']) ?>" method="post" autocomplete="off">
					<div class="form-group">
						<label>Designação :</label>
						<input type="text" name="txt_designacao" class="form-control" placeholder="Nome do produto" value="<?php echo $produto['designacao']; ?>" required>
					</div>
					<?php if(isset($mensagem)):	?>
						<div class="alert alert-danger text-center">
							<?php echo $mensagem; ?>
						</div>
					<?php endif; ?>
					<div class="text-center">
						<a href="<?php echo site_url("gestao/home") ?>" class="btn btn-secondary"> Cancelar </a>
						<button class="btn btn-success" type="submit">Atualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>