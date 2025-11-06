<?php
    require("cabecalho.php");
    require("conexao.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $cidade_inicio = $_POST['cidade_inicio'];
        $estado_inicio = $_POST['estado_inicio'];
        $cidade_fim = $_POST['cidade_fim'];
        $estado_fim = $_POST['estado_fim'];
        
        try{
            $stmt = $pdo->prepare("
                INSERT INTO rota (cidade_inicio, estado_inicio, cidade_fim, estado_fim) 
                VALUES (?, ?, ?, ?)
            ");
            if($stmt->execute([$cidade_inicio, $estado_inicio, $cidade_fim, $estado_fim])){
                header("location: rotas.php?cadastro=true");
            }else{
                header("location: rotas.php?cadastro=false");
            }
        } catch(Exception $e){
            echo "Erro ao inserir: ".$e->getMessage();
        }
    }

?>

<h1>Nova Rota (RF3)</h1>
<form method="post">
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="cidade_inicio" class="form-label">Cidade de Início</label>
            <input type="text" id="cidade_inicio" name="cidade_inicio" class="form-control" required="">
        </div>
        <div class="col-md-4 mb-3">
            <label for="estado_inicio" class="form-label">Estado (UF)</label>
            <input type="text" id="estado_inicio" name="estado_inicio" class="form-control" maxlength="2" required="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="cidade_fim" class="form-label">Cidade de Fim</label>
            <input type="text" id="cidade_fim" name="cidade_fim" class="form-control" required="">
        </div>
        <div class="col-md-4 mb-3">
            <label for="estado_fim" class="form-label">Estado (UF)</label>
            <input type="text" id="estado_fim" name="estado_fim" class="form-control" maxlength="2" required="">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
    require("rodape.php");
?>