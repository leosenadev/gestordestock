<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="row pt-2 pb-2">
		<div class="col-sm-6 offset-sm-3 col-8 offset-2">
			<div class="text-center p-3 alert alert-<?php echo $tipo; ?>">
				<p><?php echo $mensagem; ?></p>
			</div>
		</div>
	</div>
</div>