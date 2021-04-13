<main>


  <section id="title-section">
    <div class="container mt-4">
      <div style="display:flex;justify-content:space-between; align-items:center;">
        <h1>Criar um Vendedor</h1>
        <a href="vendedores.php">
          <button class="btn btn-success">Voltar</button>
        </a>
      </div>      
    </div>
  </section>


  <form method="post">

    <div class="form-group">
      <label>Nome do Vendedor</label>
      <input class="form-control" name="name" required>
    </div>

    <div class="form-group">
      <label>Email do Vendedor</label>
      <input name="email" id="email" type="email" class="form-control" required>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
  </form>
</main>