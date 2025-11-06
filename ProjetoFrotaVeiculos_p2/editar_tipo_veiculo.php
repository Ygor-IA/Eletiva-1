<?php
    require("cabecalho.php");
    require("conexao.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT * FROM tipo_veiculo WHERE id = ?");
            $stmt->execute([$id]);
            $tipo = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$tipo){ die("Tipo de veículo não encontrado!"); }
        } catch(Exception $e){ echo "Erro ao buscar dados: ".$e->getMessage(); }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        try{
            $stmt = $pdo->prepare("UPDATE tipo_veiculo SET nome = ? WHERE id = ?");
            if($stmt->execute([$nome, $id])){
                header('location: tipos_veiculo.php?editar=true');
            } else {
                header('location: tipos_veiculo.php?editar=false');
            }
        }catch(\Exception $e){ echo "Erro ao atualizar: ".$e->getMessage(); }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Editar Tipo de Veículo</h1>
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?= $tipo['id'] ?>">
                    
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do tipo:</label>
                        <input type="text" id="nome" name="nome" class="form-control" 
                               value="<?= $tipo['nome'] ?>" required="">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                         <a href="tipos_veiculo.php" class="btn btn-secondary">Cancelar</a>
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