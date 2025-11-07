<?php
    require("cabecalho.php");
    require("conexao.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT * FROM motorista WHERE id = ?");
            $stmt->execute([$id]);
            $motorista = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$motorista){ die("Motorista não encontrado!"); }
        } catch(Exception $e){ echo "Erro ao buscar dados: ".$e->getMessage(); }
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cnh = $_POST['cnh'];
        try{
            $stmt = $pdo->prepare("UPDATE motorista SET nome = ?, cnh = ? WHERE id = ?");
            if($stmt->execute([$nome, $cnh, $id])){
                header('location: motoristas.php?editar=true');
            } else {
                header('location: motoristas.php?editar=false');
            }
        }catch(\Exception $e){ echo "Erro ao atualizar: ".$e->getMessage(); }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Editar Motorista</h1>
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?= $motorista['id'] ?>">
                    
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome completo:</label>
                        <input type="text" id="nome" name="nome" class="form-control" 
                               value="<?= $motorista['nome'] ?>" required="">
                    </div>
                    <div class="mb-3">
                        <label for="cnh" class="form-label">CNH:</label>
                        <input type="text" id="cnh" name="cnh" class="form-control" 
                               value="<?= $motorista['cnh'] ?>" required="">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                         <a href="motoristas.php" class="btn btn-secondary">Cancelar</a>
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