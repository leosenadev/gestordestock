<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 
<div class="container-fluid mt-4">
	<div class="row justify-content-md-center ">
		<div class="col-xl">
			<div class="card p-2  text-center">
				<h3><i class="fas fa-cogs"></i> Configurações</h3><br>
                <div class="text-center m-2">
					<a href="<?php echo site_url("geral/inserirusuarios"); ?>" class="btn btn-secondary btn-lg btn-block col text-justify"><i class="fas fa-user"></i> Inserir usuários - user e senha: admin</a>
				</div>
				<div class="text-center m-2">
					<a href="<?php echo site_url("geral/inserirprodutos"); ?>" class="btn btn-secondary btn-lg btn-block col text-justify"><i class="fas fa-box-open"></i> Inserir produtos</a>
				</div>
                <div class="m-2">
					<a href="<?php echo site_url("geral/resetdb"); ?>" class="btn btn-secondary btn-lg btn-block col text-justify " > <i class="fas fa-database"></i> Reiniciar DB</a>
				</div>
				
				<div class="text-center m-2">
					<a href="<?php echo site_url("geral") ?>" class="btn btn-secondary btn-lg btn-block col text-justify"> <i class="fas fa-arrow-circle-left"></i> Voltar</a>
				</div>
            
                
			</div>
		</div>
	</div>
</div>
