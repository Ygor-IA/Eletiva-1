<?php
    require("cabecalho.php");
    require("conexao.php"); // FUNDAMENTAL: Precisamos nos conectar ao BD

    // --- Bloco PHP para buscar dados dos gráficos ---
    
    // 1. GRÁFICO DE VIAGENS POR ROTA
    $labels_rotas = [];
    $data_rotas = [];
    try {
        $stmt = $pdo->query("
            SELECT 
                CONCAT(r.cidade_inicio, ' -> ', r.cidade_fim) as rota, 
                COUNT(*) as total 
            FROM viagem vi
            JOIN rota r ON vi.rota_id = r.id
            GROUP BY rota
            ORDER BY total DESC
        ");
        $dados_rotas_bruto = $stmt->fetchAll();
        
        foreach($dados_rotas_bruto as $d) {
            $labels_rotas[] = $d['rota'];
            $data_rotas[] = $d['total'];
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados do gráfico de rotas: ".$e->getMessage();
    }
    
    // 2. GRÁFICO DE ATIVIDADE POR MOTORISTA (TOP 5)
    $labels_motoristas = [];
    $data_motoristas = [];
    try {
        $stmt = $pdo->query("
            SELECT 
                m.nome, 
                COUNT(*) as total 
            FROM viagem vi
            JOIN motorista m ON vi.motorista_id = m.id
            GROUP BY m.nome 
            ORDER BY total DESC
            LIMIT 5
        ");
        $dados_motoristas_bruto = $stmt->fetchAll();
        
        foreach($dados_motoristas_bruto as $d) {
            $labels_motoristas[] = $d['nome'];
            $data_motoristas[] = $d['total'];
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados do gráfico de motoristas: ".$e->getMessage();
    }
    
    // Converte para JSON
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
            <form>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="filtroDataInicio" class="form-label">Data Início</label>
                        <input type="date" class="form-control" id="filtroDataInicio">
                    </div>
                    <div class="col-md-3">
                        <label for="filtroDataFim" class="form-label">Data Fim</label>
                        <input type="date" class="form-control" id="filtroDataFim">
                    </div>
                    <div class="col-md-3">
                        <label for="filtroMotorista" class="form-label">Motorista</label>
                        <select id="filtroMotorista" class="form-select">
                            <option selected>Todos...</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filtroVeiculo" class="form-label">Veículo</label>
                        <select id="filtroVeiculo" class="form-select">
                            <option selected>Todos...</option>
                        </select>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
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
                <div class="card-header">Top 5 Motoristas Mais Ativos</div>
                <div class="card-body">
                     <canvas id="graficoAtividadeMotorista" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // #################################################################
    // ####   SCRIPT DO GRÁFICO 1 (ROTAS) - DADOS DINÂMICOS   ####
    // #################################################################
    const labelsRotas = <?php echo $json_labels_rotas; ?>;
    const dataRotas = <?php echo $json_data_rotas; ?>;

    const ctxDetalhado = document.getElementById('graficoViagensPorRota');
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

    // ######################################################################
    // ####   SCRIPT DO GRÁFICO 2 (MOTORISTAS) - DADOS DINÂMICOS   ####
    // ######################################################################
    const labelsMotoristas = <?php echo $json_labels_motoristas; ?>;
    const dataMotoristas = <?php echo $json_data_motoristas; ?>;
    
    const ctxMotorista = document.getElementById('graficoAtividadeMotorista');
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
            indexAxis: 'y', // Faz o gráfico ser de barras horizontais
        }
    });
</script>

<?php
  require("rodape.php");
?>