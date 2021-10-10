<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-sm-8 col-12 text-left">
            <a href="<?php echo site_url("gestao/novo") ?>" class="btn btn-sm btn-success"> <i class="fas fa-plus-circle"></i> Novo produto</a>
            <a href="<?php echo site_url("gestao/movimentos") ?>" class="btn btn-sm btn-secondary"> <i class="fas fa-dolly"></i> Movimentos </a>

        </div>
        <div class="col-sm-4 col-12 text-right">
            <a href="<?php echo site_url("geral/logout") ?>" class="btn btn-sm btn-warning"><i class="fas fa-sign-out-alt"></i> Sair </a>
        </div>
    </div>
    <hr>
    <div class="mt-3 mb-3 col-12">
        <?php if (count($produto) == 0) : ?>
            <p class="text-center alert alert-danger"><i class="fas fa-info-circle"></i> Não existe produtos registrados.</p>
        <?php else : ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">

                        <th class="text-left">Produto</th>
                        <th class="text-center">Quantidade</th>
                        <th class="text-center">Ações</th>

                    </thead>

                    <?php foreach ($produto as $produtos) : ?>
                        <tr>
                            <td class="text-left">
                                <a href="<?php echo site_url("gestao/editar/" . $produtos['id_produto']) ?>" class="mr-3"><i class="fa fa-pencil"></i></a>

                                <?php echo ucfirst($produtos['designacao']); ?>
                            </td>
                            <td class="text-center">

                                <?php echo $produtos['quantidade']; ?>

                            </td>
                            <td class="text-center">

                                <a href="<?php echo site_url("gestao/adicionar/" . $produtos['id_produto']) ?>" class="mr-3"><i class="fa fa-plus-square "></i></a>
                                <a href="<?php echo site_url("gestao/subtrair/" . $produtos['id_produto']) ?>" class="mr-3"><i class="fa fa-minus-square"></i></a>
                                <a href="<?php echo site_url("gestao/eliminar/" . $produtos['id_produto']) ?>" class="mr-3"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
            <tr>
                <p>Total produtos : <b> <?php echo $totalproduto; ?> </b> </p>
            <?php endif; ?>
    </div>
</div>