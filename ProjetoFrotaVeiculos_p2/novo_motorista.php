<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $cnh = $_POST['cnh'];
        try{
            $stmt = 
                $pdo->prepare("INSERT INTO motorista (nome, cnh) VALUES (?, ?)");
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

    <h1>Novo Motorista (RF2)</h1>
    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome completo:</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="cnh" class="form-label">Informe a CNH:</label>
            <input type="text" id="cnh" name="cnh" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

<?php
    require("rodape.php");
?>