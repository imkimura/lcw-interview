<main>

  <section>
    <a href="vendedores.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <form method="post">

    <div class="form-group">
      <label>Nome do Vendedor</label>
      <input class="form-control" name="name" value="<?=$vendedor->name?>">
    </div>

    <div class="form-group">
      <label>Email do Vendedor</label>
      <input name="email" id="email" class="form-control" value="<?=$vendedor->email?>">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </form>
</main>