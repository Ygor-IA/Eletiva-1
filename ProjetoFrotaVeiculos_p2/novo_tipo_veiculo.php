<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        try{
            $stmt = 
                $pdo->prepare("INSERT INTO tipo_veiculo (nome) VALUES (?)");
            if($stmt->execute([$nome])){
                // Assumindo que a listagem será 'tipos_veiculo.php'
                header('location: tipos_veiculo.php?cadastro=true');
            } else {
                header('location: tipos_veiculo.php?cadastro=false');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

    <h1>Novo Tipo de Veículo</h1>
    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome do tipo (Ex: Carro, Caminhão):</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

<?php
    require("rodape.php");
?>