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
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir-venda.php?id='.$venda->id.'">
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

  <section>
    <a href="cadastrar-venda.php">
      <button class="btn btn-success">Nova Venda</button>
    </a>
  </section>

</main>