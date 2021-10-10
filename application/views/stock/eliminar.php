<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container pt-5 pb-5">
	<div class="row">
		<div class="col-sm-6 offset-sm-3 col-12">
			<div class="card p-4 text-center">
				<h4><?php echo $produto['designacao']; ?></h4>
				<p> Deseja excluir este item ?</p>
				<div class="pt-3 pb-3">
					<a href="<?php echo site_url("gestao/home") ?>" class="btn btn-secondary">Cancelar</a>
					<a href="<?php echo site_url("gestao/eliminar/".$produto['id_produto']."/true") ?>" class="btn btn-warning">Excluir</a>
				</div>
			</div>
		</div>
	</div>
</div>