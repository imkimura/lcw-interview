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
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="listar-vendas.php?id='.$vendedor->id.'">
                          <button type="button" class="btn btn-warning">Listar Vendas</button>
                        </a>
                        <a href="excluir-vendedor.php?id='.$vendedor->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '';

?>
<main>

  <?=$mensagem?>

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

  <section>
    <a href="cadastrar-vendedor.php">
      <button class="btn btn-success">Novo vendedor</button>
    </a>
  </section>

</main>