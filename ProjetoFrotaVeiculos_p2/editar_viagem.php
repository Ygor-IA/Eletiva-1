<?php
    require("cabecalho.php");
    require("conexao.php");
    
    // Lógica para carregar os dados existentes (GET)
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            // Busca a viagem específica
            $stmt_viagem = $pdo->prepare("SELECT * FROM viagem WHERE id = ?");
            $stmt_viagem->execute([$id]);
            $viagem = $stmt_viagem->fetch(PDO::FETCH_ASSOC);
            if(!$viagem){
                die("Viagem não encontrada!");
            }
            
            // Formata a data para o input datetime-local
            $viagem['data_viagem'] = date('Y-m-d\TH:i', strtotime($viagem['data_viagem']));

            // Buscar dados para os dropdowns
            $veiculos = $pdo->query("SELECT id, placa, modelo FROM veiculo")->fetchAll();
            $motoristas = $pdo->query("SELECT id, nome FROM motorista")->fetchAll();
            $rotas = $pdo->query("SELECT id, cidade_inicio, cidade_fim FROM rota")->fetchAll();

        } catch(Exception $e){
            echo "Erro ao buscar dados: ".$e->getMessage();
        }
    }

    // Lógica para atualizar os dados (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $data_viagem = $_POST['data_viagem'];
        $veiculo_id = $_POST['veiculo_id'];
        $motorista_id = $_POST['motorista_id'];
        $rota_id = $_POST['rota_id'];
        
        try{
            $stmt = $pdo->prepare("
                UPDATE viagem SET data_viagem = ?, veiculo_id = ?, motorista_id = ?, rota_id = ? 
                WHERE id = ?
            ");
            if($stmt->execute([$data_viagem, $veiculo_id, $motorista_id, $rota_id, $id])){
                header("location: viagens.php?editar=true");
            }else{
                header("location: viagens.php?editar=false");
            }
        } catch(Exception $e){
            echo "Erro ao atualizar: ".$e->getMessage();
        }
    }
?>

<h1>Editar Registro de Viagem (RF4)</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $viagem['id'] ?>">

    <div class="mb-3">
        <label for="data_viagem" class="form-label">Data e Hora da Viagem</label>
        <input type="datetime-local" id="data_viagem" name="data_viagem" class="form-control" 
               value="<?= $viagem['data_viagem'] ?>" required="">
    </div>

    <div class="mb-3">
        <label for="veiculo_id" class="form-label">Veículo</label>
        <select id="veiculo_id" name="veiculo_id" class="form-select" required="">
            <option value="">-- Selecione --</option>
            <?php foreach ($veiculos as $v): ?>
                <?php $selected = ($v['id'] == $viagem['veiculo_id']) ? 'selected' : ''; ?>
                <option value="<?= $v['id'] ?>" <?= $selected ?>>  
                    <?= $v['placa'] ?> (<?= $v['modelo'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="motorista_id" class="form-label">Motorista</label>
        <select id="motorista_id" name="motorista_id" class="form-select" required="">
            <option value="">-- Selecione --</option>
            <?php foreach ($motoristas as $m): ?>
                <?php $selected = ($m['id'] == $viagem['motorista_id']) ? 'selected' : ''; ?>
                <option value="<?= $m['id'] ?>" <?= $selected ?>>  
                    <?= $m['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="rota_id" class="form-label">Rota</label>
        <select id="rota_id" name="rota_id" class="form-select" required="">
            <option value="">-- Selecione --</option>
            <?php foreach ($rotas as $r): ?>
                <?php $selected = ($r['id'] == $viagem['rota_id']) ? 'selected' : ''; ?>
                <option value="<?= $r['id'] ?>" <?= $selected ?>>  
                    <?= $r['cidade_inicio'] ?> -> <?= $r['cidade_fim'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php
    require("rodape.php");
?>