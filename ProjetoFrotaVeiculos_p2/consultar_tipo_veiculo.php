<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para Excluir (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM tipo_veiculo WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: tipos_veiculo.php?excluir=true');
            }
        } catch(PDOException $e) {
            // Erro de chave estrangeira (1451)
            if($e->getCode() == '23000' || $e->errorInfo[1] == 1451) {
                header('location: consultar_tipo_veiculo.php?id='.$id.'&erro=constraint');
            } else {
                header('location: tipos_veiculo.php?excluir=false');
            }
        }
    }

    // Lógica para Carregar Dados (GET)
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
    } else {
        die("ID não fornecido!");
    }
?>

    <h1>Confirmar Exclusão</h1>
    <p>Tem certeza que deseja excluir o seguinte tipo de veículo?</p>

    <?php
        if(isset($_GET['erro']) && $_GET['erro'] == 'constraint') {
            echo "<p class='alert alert-danger'>
                <b>Erro:</b> Este tipo não pode ser excluído, pois está sendo usado por um ou mais veículos.
            </p>";
        }
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $tipo['id'] ?>">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do tipo:</label>
            <input type="text" id="nome" name="nome" class="form-control" 
                   value="<?= $tipo['nome'] ?>" disabled>
        </div>
        
        <a href="tipos_veiculo.php" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
    </form>

<?php
    require("rodape.php");
?>