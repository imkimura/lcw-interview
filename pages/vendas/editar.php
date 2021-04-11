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

  <section>
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <form method="post">

    <div class="form-group">
      <label>Valor da Compra</label>
      <input class="form-control" name="value" value="<?=$venda->value?>">
    </div>

    <div class="form-group">
      <label>Vendedor</label>
      <select name="seller_id" id="seller_id" class="form-control">
      <?=$resultados?>
      </select>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </form>
</main>