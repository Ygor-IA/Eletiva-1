<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        try{
            $stmt = $pdo->prepare("INSERT INTO tipo_veiculo (nome) VALUES (?)");
            if($stmt->execute([$nome])){
                header('location: tipos_veiculo.php?cadastro=true');
            } else {
                header('location: tipos_veiculo.php?cadastro=false');
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
                <h1 class="h4 mb-0">Novo Tipo de Veículo</h1>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Informe o nome do tipo (Ex: Carro, Caminhão):</label>
                        <input type="text" id="nome" name="nome" class="form-control" required="">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                         <a href="tipos_veiculo.php" class="btn btn-secondary">Cancelar</a>
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