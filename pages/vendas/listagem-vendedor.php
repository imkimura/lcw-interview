<?php
  $resultados = '';
  foreach($vendas as $venda){
    $venda = (object) $venda;
    $comissao = number_format(($venda->value * 0.085), 2);
    $resultados .= '<tr>
                      <td>'.$venda->id.'</td>
                      <td>'.$venda->name.'</td>
                      <td>'.$venda->email.'</td>
                      <td> R$ '.$venda->value.'</td>
                      <td> R$ '.$comissao.'</td>
                      <td>'.date('d/m/Y',strtotime($venda->sale_date)).'</td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '';

?>
<main>

<section id="title-section">
    <div class="container mt-4">
      <div style="display:flex;justify-content:space-between; align-items:center;">
        <h1>Lista de Vendas: <?php echo $vendedor->name ?></h1>

        <a href="vendedores.php">
          <button class="btn btn-success">Voltar</button>
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
              <th>Comissao</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>
              <?=$resultados?>
          </tbody>
      </table>
    </div>
  </section>
</main>