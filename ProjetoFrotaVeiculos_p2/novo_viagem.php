<?php
    require("cabecalho.php");
    require("conexao.php");
    
    try{
        $veiculos = $pdo->query("SELECT id, placa, modelo FROM veiculo")->fetchAll();
        $motoristas = $pdo->query("SELECT id, nome FROM motorista")->fetchAll();
        $rotas = $pdo->query("SELECT id, cidade_inicio, cidade_fim FROM rota")->fetchAll();
    }catch(Exception $e){ echo "Erro ao consultar dados: ".$e->getMessage(); }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $data_viagem = $_POST['data_viagem']; $veiculo_id = $_POST['veiculo_id'];
        $motorista_id = $_POST['motorista_id']; $rota_id = $_POST['rota_id'];
        
        try{
            $stmt = $pdo->prepare("INSERT INTO viagem (data_viagem, veiculo_id, motorista_id, rota_id) VALUES (?, ?, ?, ?)");
            if($stmt->execute([$data_viagem, $veiculo_id, $motorista_id, $rota_id])){
                header("location: viagens.php?cadastro=true");
            }else{
                header("location: viagens.php?cadastro=false");
            }
        } catch(Exception $e){ echo "Erro ao inserir: ".$e->getMessage(); }
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Registrar Nova Viagem</h1>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="data_viagem" class="form-label">Data e Hora da Viagem</label>
                        <input type="datetime-local" id="data_viagem" name="data_viagem" class="form-control" required="">
                    </div>

                    <div class="mb-3">
                        <label for="veiculo_id" class="form-label">Selecione o Veículo</label>
                        <select id="veiculo_id" name="veiculo_id" class="form-select" required="">
                            <option value="">-- Selecione --</option>
                            <?php foreach ($veiculos as $v): ?>
                                <option value="<?= $v['id'] ?>">  
                                    <?= $v['placa'] ?> (<?= $v['modelo'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="motorista_id" class="form-label">Selecione o Motorista</label>
                        <select id="motorista_id" name="motorista_id" class="form-select" required="">
                            <option value="">-- Selecione --</option>
                            <?php foreach ($motoristas as $m): ?>
                                <option value="<?= $m['id'] ?>">  
                                    <?= $m['nome'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rota_id" class="form-label">Selecione a Rota</label>
                        <select id="rota_id" name="rota_id" class="form-select" required="">
                            <option value="">-- Selecione --</option>
                            <?php foreach ($rotas as $r): ?>
                                <option value="<?= $r['id'] ?>">  
                                    <?= $r['cidade_inicio'] ?> -> <?= $r['cidade_fim'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                         <a href="viagens.php" class="btn btn-secondary">Cancelar</a>
                         <button type="submit" class="btn btn-primary">Registrar Viagem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require("rodape.php");
?>