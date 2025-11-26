<?php
    require("cabecalho.php");
    require("conexao.php");


    $lista_motoristas = [];
    $lista_veiculos = [];
    try {
        $lista_motoristas = $pdo->query("SELECT id, nome FROM motorista ORDER BY nome ASC")->fetchAll();
        $lista_veiculos = $pdo->query("SELECT id, placa, modelo FROM veiculo ORDER BY placa ASC")->fetchAll();
    } catch(Exception $e) {
        echo "Erro ao buscar dados dos filtros: ".$e->getMessage();
    }

    $filtro_data_inicio = $_GET['filtroDataInicio'] ?? '';
    $filtro_data_fim = $_GET['filtroDataFim'] ?? '';
    $filtro_motorista_id = $_GET['filtroMotorista'] ?? '';
    $filtro_veiculo_id = $_GET['filtroVeiculo'] ?? '';

    $where_conditions = [];
    $where_params = [];

    if (!empty($filtro_data_inicio)) {
        $where_conditions[] = "vi.data_viagem >= ?";
        $where_params[] = $filtro_data_inicio . ' 00:00:00';
    }
    if (!empty($filtro_data_fim)) {
        $where_conditions[] = "vi.data_viagem <= ?";
        $where_params[] = $filtro_data_fim . ' 23:59:59';
    }
    if (!empty($filtro_motorista_id)) {
        $where_conditions[] = "vi.motorista_id = ?";
        $where_params[] = $filtro_motorista_id;
    }
    if (!empty($filtro_veiculo_id)) {
        $where_conditions[] = "vi.veiculo_id = ?";
        $where_params[] = $filtro_veiculo_id;
    }

    $where_sql = "";
    if (!empty($where_conditions)) {
        $where_sql = " WHERE " . implode(" AND ", $where_conditions);
    }

    $labels_rotas = [];
    $data_rotas = [];
    try {
    
        $sql = "
            SELECT 
                CONCAT(r.cidade_inicio, ' -> ', r.cidade_fim) as rota, 
                COUNT(*) as total 
            FROM viagem vi
            JOIN rota r ON vi.rota_id = r.id
            $where_sql 
            GROUP BY rota
            ORDER BY total DESC
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($where_params); 
        $dados_rotas_bruto = $stmt->fetchAll();
        
        foreach($dados_rotas_bruto as $d) {
            $labels_rotas[] = $d['rota'];
            $data_rotas[] = $d['total'];
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados do gráfico de rotas: ".$e->getMessage();
    }
    

    $labels_motoristas = [];
    $data_motoristas = [];
    try {
        $sql = "
            SELECT 
                m.nome, 
                COUNT(*) as total 
            FROM viagem vi
            JOIN motorista m ON vi.motorista_id = m.id
            $where_sql
            GROUP BY m.nome 
            ORDER BY total DESC
            LIMIT 10
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($where_params); 
        $dados_motoristas_bruto = $stmt->fetchAll();
        
        foreach($dados_motoristas_bruto as $d) {
            $labels_motoristas[] = $d['nome'];
            $data_motoristas[] = $d['total'];
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados do gráfico de motoristas: ".$e->getMessage();
    }
    
    $json_labels_rotas = json_encode($labels_rotas);
    $json_data_rotas = json_encode($data_rotas);
    $json_labels_motoristas = json_encode($labels_motoristas);
    $json_data_motoristas = json_encode($data_motoristas);

?>

    <div class="p-4 mb-4 bg-white rounded-3 shadow-sm">
      <div class="container-fluid">
        <h1 class="display-6 fw-bold">Relatórios da Frota</h1>
        <p class="col-md-10 fs-5">
            Utilize os filtros abaixo para gerar relatórios detalhados sobre as operações da frota.
        </p>
      </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h2 class="h5 mb-0">Filtrar Relatórios</h2>
        </div>
        <div class="card-body">
            <form action="relatorios.php" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="filtroDataInicio" class="form-label">Data Início</label>
                        <input type="date" class="form-control" id="filtroDataInicio" name="filtroDataInicio" 
                               value="<?= htmlspecialchars($filtro_data_inicio) ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="filtroDataFim" class="form-label">Data Fim</label>
                        <input type="date" class="form-control" id="filtroDataFim" name="filtroDataFim"
                               value="<?= htmlspecialchars($filtro_data_fim) ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="filtroMotorista" class="form-label">Motorista</label>
                        <select id="filtroMotorista" name="filtroMotorista" class="form-select">
                            <option value="">Todos...</option>
                            <?php foreach($lista_motoristas as $motorista): ?>
                                <?php $selected = ($motorista['id'] == $filtro_motorista_id) ? 'selected' : ''; ?>
                                <option value="<?= $motorista['id'] ?>" <?= $selected ?>>
                                    <?= htmlspecialchars($motorista['nome']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filtroVeiculo" class="form-label">Veículo</label>
                        <select id="filtroVeiculo" name="filtroVeiculo" class="form-select">
                            <option value="">Todos...</option>
                             <?php foreach($lista_veiculos as $veiculo): ?>
                                <?php $selected = ($veiculo['id'] == $filtro_veiculo_id) ? 'selected' : ''; ?>
                                <option value="<?= $veiculo['id'] ?>" <?= $selected ?>>
                                    <?= htmlspecialchars($veiculo['placa']) ?> (<?= htmlspecialchars($veiculo['modelo']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                <a href="relatorios.php" class="btn btn-outline-secondary">Limpar Filtros</a>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">Relatório de Viagens por Rota</div>
                <div class="card-body">
                    <canvas id="graficoViagensPorRota" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">Relatório de Atividade por Motorista</div>
                <div class="card-body">
                     <canvas id="graficoAtividadeMotorista" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labelsRotas = <?php echo $json_labels_rotas; ?>;
    const dataRotas = <?php echo $json_data_rotas; ?>;

    const ctxDetalhado = document.getElementById('graficoViagensPorRota');
    if (labelsRotas.length > 0) {
        new Chart(ctxDetalhado, {
            type: 'bar',
            data: {
                labels: labelsRotas,
                datasets: [{
                    label: 'Nº de Viagens',
                    data: dataRotas,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    } else {
        ctxDetalhado.parentNode.innerHTML = '<p class="text-center text-muted">Nenhum dado encontrado para os filtros selecionados.</p>';
    }

    const labelsMotoristas = <?php echo $json_labels_motoristas; ?>;
    const dataMotoristas = <?php echo $json_data_motoristas; ?>;
    
    const ctxMotorista = document.getElementById('graficoAtividadeMotorista');
    if (labelsMotoristas.length > 0) {
        new Chart(ctxMotorista, {
            type: 'bar',
            data: {
                labels: labelsMotoristas,
                datasets: [{
                    label: 'Nº de Viagens',
                    data: dataMotoristas,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y', 
            }
        });
    } else {
        if (labelsRotas.length === 0) {
             ctxMotorista.parentNode.innerHTML = '<p class="text-center text-muted">Nenhum dado encontrado para os filtros selecionados.</p>';
        }
    }
</script>

<?php
  require("rodape.php");
?>