<main>

  <h2 class="mt-3">Excluir venda</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir a venda <strong><?=$vendedor->id?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="vendedores.php">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>

      <button type="submit" name="delete" class="btn btn-danger">Excluir</button>
    </div>

  </form>

</main>