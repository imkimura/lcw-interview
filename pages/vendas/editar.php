<?php 
    
    $resultados = '';
    
    foreach($vendedores as $vendedor) {
        if($vendedor->id == $venda->seller_id) {
            $resultados .= '<option selected value='.$vendedor->id.'>'. $vendedor->name.'</option>';
        } else {
            $resultados .= '<option value='.$vendedor->id.'>'. $vendedor->name.'</option>';
        }
    }

    $resultados = strlen($resultados) ? $resultados : '<option selected>Cadastre um vendedor primeiro</option>';
?>
<main>


  <section id="title-section">
    <div class="container mt-4">
      <div style="display:flex;justify-content:space-between; align-items:center;">
        <h1>Editar uma Venda</h1>
        <a href="vendas.php">
          <button class="btn btn-success">Voltar</button>
        </a>
      </div>      
    </div>
  </section>

  <form method="post">

    <div class="form-group">
      <label>Valor da Compra</label>
      <input class="form-control" name="value" value="<?=$venda->value?>" required>
    </div>

    <div class="form-group">
      <label>Data da Compra</label>
      <input class="form-control" name="sale_date" type="date" value="<?=date('Y-m-d',strtotime($venda->sale_date))?>" required>
    </div>

    <div class="form-group">
      <label>Vendedor</label>
      <select name="seller_id" id="seller_id" class="form-control">
      <?=$resultados?>
      </select>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Editar</button>
    </div>
  </form>
</main>