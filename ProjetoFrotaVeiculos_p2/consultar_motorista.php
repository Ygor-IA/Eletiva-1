<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para Excluir (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM motorista WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: motoristas.php?excluir=true');
            }
        } catch(PDOException $e) {
            // Erro de chave estrangeira
            if($e->getCode() == '23000' || $e->errorInfo[1] == 1451) {
                header('location: consultar_motorista.php?id='.$id.'&erro=constraint');
            } else {
                header('location: motoristas.php?excluir=false');
            }
        }
    }

    // Lógica para Carregar Dados (GET)
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
    } else {
        die("ID não fornecido!");
    }
?>

    <h1>Confirmar Exclusão</h1>
    <p>Tem certeza que deseja excluir o seguinte motorista?</p>

    <?php
        if(isset($_GET['erro']) && $_GET['erro'] == 'constraint') {
            echo "<p class='alert alert-danger'>
                <b>Erro:</b> Este motorista não pode ser excluído, pois está sendo usado em um ou mais registros de viagem.
            </p>";
        }
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $motorista['id'] ?>">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" 
                   value="<?= $motorista['nome'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="cnh" class="form-label">CNH:</label>
            <input type="text" id="cnh" name="cnh" class="form-control" 
                   value="<?= $motorista['cnh'] ?>" disabled>
        </div>
        
        <a href="motoristas.php" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
    </form>

<?php
    require("rodape.php");
?>