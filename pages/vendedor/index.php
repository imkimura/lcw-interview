<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($vendedores as $vendedor){
    $resultados .= '<tr>
                      <td>'.$vendedor->id.'</td>
                      <td>'.$vendedor->name.'</td>
                      <td>'.$vendedor->email.'</td>
                      <td>
                        <a href="editar-vendedor.php?id='.$vendedor->id.'">
                          <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="#confirmModal" data-toggle="modal" data-id-action="excluir-vendedor.php?id='.$vendedor->id.'">
                          <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </a>
                        <a href="listar-vendas.php?id='.$vendedor->id.'">
                          <button type="button" class="btn btn-warning">Listar Vendas</button>
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
        <h1>Lista de Vendedores</h1>

        <a href="cadastrar-vendedor.php">
          <button class="btn btn-success">Novo vendedor</button>
        </a>
      </div>
    </div>
  </section>

  <section>
    <div class="table-responsive col-sm-12 mt-4">
      <table id="dataTable" class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
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
                <p>Você realmente deseja excluir este Vendedor? O processo não pode ser desfeito.</p>
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