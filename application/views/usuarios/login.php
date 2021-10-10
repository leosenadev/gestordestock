<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-sm-6 offset-sm-3 col-8 offset-2">
			<div class="card p-4">
				<h4>Login</h4><br>
				<form action="<?php echo site_url('geral/verificarlogin'); ?>" method="post" autocomplete="off">
					<div class="form-group">
						<input type="text" name="txt_usuario" class="form-control" placeholder="Usuário" required>
					</div>
					<div class="form-group">
						<input type="password" name="txt_senha" class="form-control" placeholder="Senha" required>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-success btn-block">Entrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>