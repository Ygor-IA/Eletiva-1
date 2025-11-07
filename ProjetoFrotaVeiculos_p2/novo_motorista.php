<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $cnh = $_POST['cnh'];
        try{
            $stmt = $pdo->prepare("INSERT INTO motorista (nome, cnh) VALUES (?, ?)");
            if($stmt->execute([$nome, $cnh])){
                header('location: motoristas.php?cadastro=true');
            } else {
                header('location: motoristas.php?cadastro=false');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Novo Motorista</h1>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Informe o nome completo:</label>
                        <input type="text" id="nome" name="nome" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <label for="cnh" class="form-label">Informe a CNH:</label>
                        <input type="text" id="cnh" name="cnh" class="form-control" required="">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                         <a href="motoristas.php" class="btn btn-secondary">Cancelar</a>
                         <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require("rodape.php");
?>