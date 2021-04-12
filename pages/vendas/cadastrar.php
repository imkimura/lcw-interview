<?php 
    
    $resultados = '';
    
    foreach($vendedores as $vendedor)
      $resultados .= '<option value='.$vendedor->id.'>'. $vendedor->name.'</option>';

    $resultados = strlen($resultados) ? $resultados : '<option selected>Cadastre um vendedor primeiro</option>';
?>
<main>

  <section id="title-section">
    <div class="container mt-4">
      <div style="display:flex;justify-content:space-between; align-items:center;">
        <h1>Cadastre uma nova Venda</h1>
        <a href="vendas.php">
          <button class="btn btn-success">Voltar</button>
        </a>
      </div>      
    </div>
  </section>

  <form method="post">

    <div class="form-group">
      <label>Valor da Compra</label>
      <input class="form-control" name="value" required>
    </div>

    <div class="form-group">
      <label>Data da Compra</label>
      <input class="form-control" type="date" name="sale_date" required>
    </div>

    <div class="form-group">
      <label>Vendedor</label>
      <select name="seller_id" id="seller_id" class="form-control">
      <?=$resultados?>
      </select>
    </div>

    <div class="form-group mt-4">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </form>
</main>