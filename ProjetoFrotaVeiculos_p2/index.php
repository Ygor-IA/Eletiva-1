<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    require('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    try{
      $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
      $stmt->execute([$email]);
      $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
      if($usuario && password_verify($senha, $usuario['senha'])){
        session_start();
        $_SESSION['acesso'] = true;
        $_SESSION['nome'] = $usuario['nome'];
        header('location: principal.php');
        exit();
      } else {
        $erro_login = "Credenciais inválidas!";
      }
    } catch(\Exception $e){
      $erro_login = "Erro: ".$e->getMessage();
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f0f2f5;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
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
            <h2 class="h5 text-center mb-4">Acesso ao Sistema</h2>
            
            <?php
              if (isset($_GET['cadastro']) && $_GET['cadastro']) {
                echo "<p class='alert alert-success'>Cadastro realizado com sucesso!</p>";
              }
              if (isset($erro_login)) {
                echo "<p class='alert alert-danger'>$erro_login</p>";
              }
            ?>

            <form action="index.php" method="POST">
              <div class="mb-3">
                <label for="emailLogin" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailLogin" name="email" placeholder="Digite seu email" required />
              </div>
              <div class="mb-3">
                <label for="senhaLogin" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senhaLogin" name="senha" placeholder="Digite sua senha" required />
              </div>
              <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
            <p class="mt-3 text-center">
              Ainda não tem uma conta?
              <a href="cadastro.php">Cadastre-se aqui</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>