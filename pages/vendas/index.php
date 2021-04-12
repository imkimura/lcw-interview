<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success mt-4">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger mt-4">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($vendas as $venda){
    $venda = (object) $venda;
    $resultados .= '<tr>
                      <td>'.$venda->id.'</td>
                      <td>'.$venda->name.'</td>
                      <td>'.$venda->email.'</td>
                      <td> R$ '.$venda->value.'</td>
                      <td>'.date('d/m/Y',strtotime($venda->sale_date)).'</td>
                      <td>
                        <a href="editar-venda.php?id='.$venda->id.'">
                          <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="#confirmModal" data-id-excluir='.$venda->id.'
                        data-toggle="modal" data-id-action="excluir-venda.php?id='.$venda->id.'">
                          <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '';

?>
<main>

  <?=$mensagem?>

  <section id="title-section">
    <div class="container mt-4">
      <div style="display:flex;justify-content:space-between; align-items:center;">
        <h1>Lista de Vendas</h1>

        <a href="cadastrar-venda.php">
          <button class="btn btn-success">Nova Venda</button>
        </a>
      </div>
    </div>
  </section>

  <section>
    <div class="table-responsive col-sm-12 mt-4">
      <table id="dataTable" class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
              <th>id</th>
              <th>Vendedor</th>
              <th>Email</th>
              <th>Valor</th>
              <th>Data</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              <?=$resultados?>
          </tbody>
      </table>
    </div>
  </section>

</main>

<!-- Modal HTML -->
<div id="confirmModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box" style="font-size: 25px; color: red;">
                    <i class="fas fa-exclamation-circle">&nbsp;&nbsp;</i>
                </div>
                <h4 class="modal-title">Você tem certeza?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja excluir esta Venda? O processo não pode ser desfeito.</p>
            </div>
            <div class="modal-footer">
                <form action="." id="form-delete" method="POST">
                    
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="delete"  role="button" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>