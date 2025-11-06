<?php
    require("cabecalho.php");
    require("conexao.php");

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM rota WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: rotas.php?excluir=true');
            }
        } catch(PDOException $e) {
            if($e->getCode() == '23000' || $e->errorInfo[1] == 1451) {
                header('location: consultar_rota.php?id='.$id.'&erro=constraint');
            } else {
                header('location: rotas.php?excluir=false');
            }
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT * FROM rota WHERE id = ?");
            $stmt->execute([$id]);
            $rota = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$rota){ die("Rota não encontrada!"); }
        } catch(Exception $e){ echo "Erro ao buscar dados: ".$e->getMessage(); }
    } else { die("ID não fornecido!"); }
?>

<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">
                <h1 class="h4 mb-0">Confirmar Exclusão</h1>
            </div>
            <div class="card-body">
                <p>Tem certeza que deseja excluir a seguinte rota?</p>
                <?php
                    if(isset($_GET['erro']) && $_GET['erro'] == 'constraint') {
                        echo "<p class='alert alert-danger'>
                            <b>Erro:</b> Esta rota não pode ser excluída, pois está sendo usada em registros de viagem.
                        </p>";
                    }
                ?>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $rota['id'] ?>">

                    <fieldset class="border p-3 mb-3 rounded" disabled>
                        <legend class="float-none w-auto px-2 h6">Origem</legend>
                        <div class="row">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <label for="cidade_inicio" class="form-label">Cidade de Início</label>
                                <input type="text" id="cidade_inicio" class="form-control" value="<?= $rota['cidade_inicio'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="estado_inicio" class="form-label">Estado (UF)</label>
                                <input type="text" id="estado_inicio" class="form-control" value="<?= $rota['estado_inicio'] ?>">
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="border p-3 mb-3 rounded" disabled>
                        <legend class="float-none w-auto px-2 h6">Destino</legend>
                        <div class="row">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <label for="cidade_fim" class="form-label">Cidade de Fim</label>
                                <input type="text" id="cidade_fim" class="form-control" value="<?= $rota['cidade_fim'] ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="estado_fim" class="form-label">Estado (UF)</label>
                                <input type="text" id="estado_fim" class="form-control" value="<?= $rota['estado_fim'] ?>">
                            </div>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-between">
                        <a href="rotas.php" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require("rodape.php");
?>