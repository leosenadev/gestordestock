<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid pt-3 pb-3">
    <div class="row">
        <div class="col-6">
            <a href="<?php echo site_url("gestao/home") ?>" class="btn btn-sm btn-primary">Voltar</a>
            
        </div>
        <div class="col-6 text-right">
            <a href="<?php echo site_url("gestao/limparregistromovimentos")  ?>" class="btn btn-warning">Limpar registro de movimentos</a>
        </div>

    </div>
    <hr>
    <?php if(count($movimentos) == 0): ?>
        <div class="text-center pt-2 pb-2">
        <p class="text-center alert alert-danger"><i class="fas fa-info-circle"></i> Não existe movimentos.</p>
        </div>
    <?php else: ?>
        <table class="table table-hover">
            <thead class="thead-light">
                <th>Data</th>
                <th>Produto</th>
                <th>Movimento</th>
            </thead>
            <?php foreach($movimentos as $movimento): ?>
                <tr>
                    <td><?php echo $movimento['data_hora'] ?> </td>
                    <td><?php echo $movimento['designacao'] ?> </td>
                    <td><?php echo $movimento['quantidade'] ?> </td>


                </tr>
            <?php endforeach; ?>
        </table>
        <hr>
        <p>Movimentos : <b><?php echo count($movimentos) ?></b></p>
     <?php endif; ?>

</div>