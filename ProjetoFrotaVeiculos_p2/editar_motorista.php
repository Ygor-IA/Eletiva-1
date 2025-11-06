<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para carregar os dados existentes (GET)
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT * FROM motorista WHERE id = ?");
            $stmt->execute([$id]);
            $motorista = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$motorista){
                die("Motorista não encontrado!");
            }
        } catch(Exception $e){
            echo "Erro ao buscar dados: ".$e->getMessage();
        }
    }

    // Lógica para atualizar os dados (POST)
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
        }catch(\Exception $e){
            echo "Erro ao atualizar: ".$e->getMessage();
        }
    }
?>

    <h1>Editar Motorista (RF2)</h1>
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
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

<?php
    require("rodape.php");
?>
