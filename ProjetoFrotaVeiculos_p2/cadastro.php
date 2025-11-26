<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      require("conexao.php");
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
      try{
          $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
          if($stmt->execute([$nome, $email, $senha])){
              header("location: index.php?cadastro=true");
              exit();
          } else{
              $erro_cadastro = "Erro ao realizar o cadastro!";
          }
      } catch(Exception $e){
          if($e->getCode() == '23000' && str_contains($e->getMessage(), '1062')) {
               $erro_cadastro = "Este e-mail já está cadastrado!";
          } else {
               $erro_cadastro = "Erro ao executar o comando SQL: ".$e->getMessage();
          }
      }
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f0f2f5;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 2rem 0;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5 col-xl-4">
        
        <div class="card shadow-sm border-0">
          <div class="card-header bg-dark text-white text-center">
            <h1 class="h3 mb-0 py-2">Sistema Frota</h1>
          </div>
          <div class="card-body p-4">
            <h2 class="h5 text-center mb-4">Cadastro de Usuário</h2>
            
            <?php
              if (isset($erro_cadastro)) {
                echo "<p class='alert alert-danger'>$erro_cadastro</p>";
              }
            ?>

            <form action="cadastro.php" method="POST">
              <div class="mb-3">
                <label for="nomeCadastro" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nomeCadastro" name="nome" placeholder="Digite seu nome completo" required />
              </div>
              <div class="mb-3">
                <label for="emailCadastro" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailCadastro" name="email" placeholder="Digite seu email" required />
              </div>
              <div class="mb-3">
                <label for="senhaCadastro" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senhaCadastro" name="senha" placeholder="Digite uma senha" required />
              </div>
              <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </form>
            <p class="mt-3 text-center">
              Já tem uma conta? 
              <a href="index.php">Faça login aqui</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>