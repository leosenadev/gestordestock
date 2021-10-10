<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-sm-8 offset-sm-2 col-12">
			<div class="card p-4">
				<h3>Designação</h3>
				<hr>
				<form action="<?php echo site_url("gestao/novogravar") ?>" method="post" autocomplete="off">
					<div class="form-group">
						<label>Designação :</label>
						<input type="text" name="txt_designacao" class="form-control" placeholder="Nome do produto"  required>
					</div>
					<?php if(isset($mensagem)):	?>
						<div class="alert alert-danger text-center">
							<?php echo $mensagem; ?>
						</div>
					<?php endif; ?>
					<div class="text-center">
						<a href="<?php echo site_url("gestao/home") ?>" class="btn btn-secondary"> Cancelar </a>
						<button class="btn btn-success" type="submit">Adicionar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>