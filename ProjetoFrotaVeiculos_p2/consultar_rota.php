<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para Excluir (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM rota WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: rotas.php?excluir=true');
            }
        } catch(PDOException $e) {
            // Erro de chave estrangeira
            if($e->getCode() == '23000' || $e->errorInfo[1] == 1451) {
                header('location: consultar_rota.php?id='.$id.'&erro=constraint');
            } else {
                header('location: rotas.php?excluir=false');
            }
        }
    }

    // Lógica para Carregar Dados (GET)
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT * FROM rota WHERE id = ?");
            $stmt->execute([$id]);
            $rota = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$rota){
                die("Rota não encontrada!");
            }
        } catch(Exception $e){
            echo "Erro ao buscar dados: ".$e->getMessage();
        }
    } else {
        die("ID não fornecido!");
    }
?>

<h1>Confirmar Exclusão</h1>
<p>Tem certeza que deseja excluir a seguinte rota?</p>

<?php
    if(isset($_GET['erro']) && $_GET['erro'] == 'constraint') {
        echo "<p class='alert alert-danger'>
            <b>Erro:</b> Esta rota não pode ser excluída, pois está sendo usada em um ou mais registros de viagem.
        </p>";
    }
?>

<form method="post">
    <input type="hidden" name="id" value="<?= $rota['id'] ?>">

    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="cidade_inicio" class="form-label">Cidade de Início</label>
            <input type="text" id="cidade_inicio" name="cidade_inicio" class="form-control" 
                   value="<?= $rota['cidade_inicio'] ?>" disabled>
        </div>
        <div class="col-md-4 mb-3">
            <label for="estado_inicio" class="form-label">Estado (UF)</label>
            <input type="text" id="estado_inicio" name="estado_inicio" class="form-control" 
                   value="<?= $rota['estado_inicio'] ?>" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="cidade_fim" class="form-label">Cidade de Fim</label>
            <input type="text" id="cidade_fim" name="cidade_fim" class="form-control" 
                   value="<?= $rota['cidade_fim'] ?>" disabled>
        </div>
        <div class="col-md-4 mb-3">
            <label for="estado_fim" class="form-label">Estado (UF)</label>
            <input type="text" id="estado_fim" name="estado_fim" class="form-control" 
                   value="<?= $rota['estado_fim'] ?>" disabled>
        </div>
    </div>

    <a href="rotas.php" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
</form>

<?php
    require("rodape.php");
?>