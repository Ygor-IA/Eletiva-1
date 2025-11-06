<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para carregar os dados existentes (GET)
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT * FROM tipo_veiculo WHERE id = ?");
            $stmt->execute([$id]);
            $tipo = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$tipo){
                die("Tipo de veículo não encontrado!");
            }
        } catch(Exception $e){
            echo "Erro ao buscar dados: ".$e->getMessage();
        }
    }

    // Lógica para atualizar os dados (POST)
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
        }catch(\Exception $e){
            echo "Erro ao atualizar: ".$e->getMessage();
        }
    }
?>

    <h1>Editar Tipo de Veículo</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $tipo['id'] ?>">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do tipo:</label>
            <input type="text" id="nome" name="nome" class="form-control" 
                   value="<?= $tipo['nome'] ?>" required="">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

<?php
    require("rodape.php");
?>