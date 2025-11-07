<?php
    require("cabecalho.php");
    require("conexao.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT * FROM rota WHERE id = ?");
            $stmt->execute([$id]);
            $rota = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$rota){ die("Rota não encontrada!"); }
        } catch(Exception $e){ echo "Erro ao buscar dados: ".$e->getMessage(); }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $cidade_inicio = $_POST['cidade_inicio']; $estado_inicio = $_POST['estado_inicio'];
        $cidade_fim = $_POST['cidade_fim']; $estado_fim = $_POST['estado_fim'];
        
        try{
            $stmt = $pdo->prepare("UPDATE rota SET cidade_inicio = ?, estado_inicio = ?, cidade_fim = ?, estado_fim = ? WHERE id = ?");
            if($stmt->execute([$cidade_inicio, $estado_inicio, $cidade_fim, $estado_fim, $id])){
                header("location: rotas.php?editar=true");
            }else{
                header("location: rotas.php?editar=false");
            }
        } catch(Exception $e){ echo "Erro ao atualizar: ".$e->getMessage(); }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Editar Rota</h1>
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?= $rota['id'] ?>">
                    
                    <fieldset class="border p-3 mb-3 rounded">
                        <legend class="float-none w-auto px-2 h6">Origem</legend>
                        <div class="row">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <label for="cidade_inicio" class="form-label">Cidade de Início</label>
                                <input type="text" id="cidade_inicio" name="cidade_inicio" class="form-control" 
                                       value="<?= $rota['cidade_inicio'] ?>" required="">
                            </div>
                            <div class="col-md-4">
                                <label for="estado_inicio" class="form-label">Estado (UF)</label>
                                <input type="text" id="estado_inicio" name="estado_inicio" class="form-control" maxlength="2" 
                                       value="<?= $rota['estado_inicio'] ?>" required="">
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="border p-3 mb-3 rounded">
                        <legend class="float-none w-auto px-2 h6">Destino</legend>
                        <div class="row">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <label for="cidade_fim" class="form-label">Cidade de Fim</label>
                                <input type="text" id="cidade_fim" name="cidade_fim" class="form-control" 
                                       value="<?= $rota['cidade_fim'] ?>" required="">
                            </div>
                            <div class="col-md-4">
                                <label for="estado_fim" class="form-label">Estado (UF)</label>
                                <input type="text" id="estado_fim" name="estado_fim" class="form-control" maxlength="2" 
                                       value="<?= $rota['estado_fim'] ?>" required="">
                            </div>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-between">
                         <a href="rotas.php" class="btn btn-secondary">Cancelar</a>
                         <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require("rodape.php");
?>