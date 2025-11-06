<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para carregar os dados existentes (GET)
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
    }

    // Lógica para atualizar os dados (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $cidade_inicio = $_POST['cidade_inicio'];
        $estado_inicio = $_POST['estado_inicio'];
        $cidade_fim = $_POST['cidade_fim'];
        $estado_fim = $_POST['estado_fim'];
        
        try{
            $stmt = $pdo->prepare("
                UPDATE rota SET cidade_inicio = ?, estado_inicio = ?, cidade_fim = ?, estado_fim = ? 
                WHERE id = ?
            ");
            if($stmt->execute([$cidade_inicio, $estado_inicio, $cidade_fim, $estado_fim, $id])){
                header("location: rotas.php?editar=true");
            }else{
                header("location: rotas.php?editar=false");
            }
        } catch(Exception $e){
            echo "Erro ao atualizar: ".$e->getMessage();
        }
    }

?>

<h1>Editar Rota (RF3)</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $rota['id'] ?>">

    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="cidade_inicio" class="form-label">Cidade de Início</label>
            <input type="text" id="cidade_inicio" name="cidade_inicio" class="form-control" 
                   value="<?= $rota['cidade_inicio'] ?>" required="">
        </div>
        <div class="col-md-4 mb-3">
            <label for="estado_inicio" class="form-label">Estado (UF)</label>
            <input type="text" id="estado_inicio" name="estado_inicio" class="form-control" maxlength="2" 
                   value="<?= $rota['estado_inicio'] ?>" required="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="cidade_fim" class="form-label">Cidade de Fim</label>
            <input type="text" id="cidade_fim" name="cidade_fim" class="form-control" 
                   value="<?= $rota['cidade_fim'] ?>" required="">
        </div>
        <div class="col-md-4 mb-3">
            <label for="estado_fim" class="form-label">Estado (UF)</label>
            <input type="text" id="estado_fim" name="estado_fim" class="form-control" maxlength="2" 
                   value="<?= $rota['estado_fim'] ?>" required="">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php
    require("rodape.php");
?>