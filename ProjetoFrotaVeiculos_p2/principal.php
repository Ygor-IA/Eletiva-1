<?php
    require("cabecalho.php");
    require("conexao.php"); // FUNDAMENTAL: Precisamos nos conectar ao BD

    // --- Bloco PHP para buscar dados dos gráficos ---
    
    // 1. GRÁFICO DE VIAGENS POR DIA (ÚLTIMOS 30 DIAS)
    $labels_viagens = [];
    $data_viagens = [];
    try {
        $stmt = $pdo->query("
            SELECT 
                DATE(data_viagem) as dia, 
                COUNT(*) as total 
            FROM viagem 
            WHERE data_viagem >= CURDATE() - INTERVAL 30 DAY 
            GROUP BY dia 
            ORDER BY dia ASC
        ");
        $dados_viagens_bruto = $stmt->fetchAll();
        
        // Formata os dados para o Chart.js
        foreach($dados_viagens_bruto as $d) {
            $labels_viagens[] = date('d/m', strtotime($d['dia'])); // Formata a data
            $data_viagens[] = $d['total'];
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados do gráfico de viagens: ".$e->getMessage();
    }
    
    // 2. GRÁFICO DE VEÍCULOS MAIS USADOS (TOP 5)
    $labels_veiculos = [];
    $data_veiculos = [];
    try {
        $stmt = $pdo->query("
            SELECT 
                v.placa, 
                COUNT(*) as total 
            FROM viagem vi
            JOIN veiculo v ON vi.veiculo_id = v.id
            GROUP BY v.placa 
            ORDER BY total DESC
            LIMIT 5
        ");
        $dados_veiculos_bruto = $stmt->fetchAll();
        
        // Formata os dados
        foreach($dados_veiculos_bruto as $d) {
            $labels_veiculos[] = $d['placa'];
            $data_veiculos[] = $d['total'];
        }
    } catch(Exception $e) {
        echo "Erro ao buscar dados do gráfico de veículos: ".$e->getMessage();
    }
    
    // Converte os arrays PHP para JSON para o JavaScript ler
    $json_labels_viagens = json_encode($labels_viagens);
    $json_data_viagens = json_encode($data_viagens);
    $json_labels_veiculos = json_encode($labels_veiculos);
    $json_data_veiculos = json_encode($data_veiculos);

?>
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
      <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">Seja bem-vindo(a), <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>
        <p class="col-md-10 fs-4">
            Este é o seu painel de gerenciamento de frotas. 
            Use os links abaixo ou o menu de navegação para começar.
        </p>
      </div>
    </div>

    <h2 class="h4">Visão Geral da Frota (Últimos 30 dias)</h2>
    <hr class="mb-4">

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header">Viagens por Dia</div>
                <div class="card-body">
                    <canvas id="graficoViagensPorDia"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header">Top 5 Veículos Mais Utilizados</div>
                <div class="card-body">
                    <canvas id="graficoVeiculosMaisUsados"></canvas>
                </div>
            </div>
        </div>
    </div>
    <h2>Acesso Rápido</h2>
    <hr class="mb-4">
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // #############################################################
    // ####   SCRIPT DO GRÁFICO 1 (VIAGENS) - DADOS DINÂMICOS   ####
    // #############################################################
    const labelsViagens = <?php echo $json_labels_viagens; ?>;
    const dataViagens = <?php echo $json_data_viagens; ?>;

    const dadosViagens = {
        labels: labelsViagens,
        datasets: [{
            label: 'Viagens Realizadas',
            data: dataViagens,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    
    // Renderiza o Gráfico de Linha
    const ctxViagens = document.getElementById('graficoViagensPorDia');
    new Chart(ctxViagens, {
        type: 'line',
        data: dadosViagens,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // #############################################################
    // ####   SCRIPT DO GRÁFICO 2 (VEÍCULOS) - DADOS DINÂMICOS   ####
    // #############################################################
    const labelsVeiculos = <?php echo $json_labels_veiculos; ?>;
    const dataVeiculos = <?php echo $json_data_veiculos; ?>;

    const dadosVeiculos = {
        labels: labelsVeiculos,
        datasets: [{
            label: 'Uso de Veículos',
            data: dataVeiculos,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)'
            ],
            hoverOffset: 4
        }]
    };

    // Renderiza o Gráfico de Rosca (Doughnut)
    const ctxVeiculos = document.getElementById('graficoVeiculosMaisUsados');
    new Chart(ctxVeiculos, {
        type: 'doughnut',
        data: dadosVeiculos,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

<?php
  require("rodape.php");
?>