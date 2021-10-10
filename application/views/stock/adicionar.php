<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 col-12">
            <div class="card p-4">
                <h4><?php echo $produto['designacao'] ?></h4>
                <p>Quantidade atual : <?php echo $produto['quantidade'] ?></p><hr>

                <form action="<?php echo site_url("gestao/adicionar/".$produto['id_produto']); ?>" method="post">
                    <div class="form-group">
                        <div class="col-sm-2 offset-sm-5 col-4 offset-4">
                            <input type="number" name="txt_quantidade" class="form-control" value="1" min="1">
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo site_url("gestao/home"); ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>