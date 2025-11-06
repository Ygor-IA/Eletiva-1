<?php
    require("cabecalho.php");
    require("conexao.php");
    try{
        // Busca os tipos de veículo (antigas categorias)
        $stmt = $pdo->query("SELECT * FROM tipo_veiculo");
        $tipos_veiculo = $stmt->fetchAll();
    }catch(Exception $e){
        echo "Erro ao consultar tipos de veículo: ".$e->getMessage();
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $placa = $_POST['placa'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $tipo_id = $_POST['tipo_id'];
        
        try{
            $stmt = $pdo->prepare("
                INSERT INTO veiculo (placa, modelo, ano, tipo_veiculo_id) VALUES
                (?, ?, ?, ?)
            ");
            if($stmt->execute([$placa, $modelo, $ano, $tipo_id])){
                header("location: veiculos.php?cadastro=true");
            }else{
                header("location: veiculos.php?cadastro=false");
            }
        } catch(Exception $e){
            echo "Erro ao inserir: ".$e->getMessage();
        }
    }

?>

<h1>Novo Veículo (RF1)</h1>
<form method="post">
    <div class="mb-3">
        <label for="placa" class="form-label">Informe a Placa</label>
        <input type="text" id="placa" name="placa" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Informe o Modelo</label>
        <input type="text" id="modelo" name="modelo" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="ano" class="form-label">Informe o Ano</label>
        <input type="number" id="ano" name="ano" class="form-control" min="1950" max="2100" required="">
    </div>
    <div class="mb-3">
        <label for="tipo_id" class="form-label">Selecione o Tipo de Veículo</label>
        <select id="tipo_id" name="tipo_id" class="form-select" required="">
            <option value="">-- Selecione --</option>
            <?php foreach ($tipos_veiculo as $t): ?>
                <option value="<?= $t['id'] ?>">  <?= $t['nome'] ?>  </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
    require("rodape.php");
?>