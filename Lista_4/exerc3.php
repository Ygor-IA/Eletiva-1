<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>3. Lista de Produtos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Produto <?= $i ?></h3>
        <div class="row inline-row mb-3"><div class="col-md-4">
              <label for="codigo[]" class="form-label">Código:</label>
              <input type="text" id="codigo[]" name="codigo[]" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="nome[]" class="form-label">Informe seu nome:</label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="preco[]" class="form-label">Informe o preço:</label>
              <input type="number" id="preco[]" name="preco[]" class="form-control" required="">
            </div></div>
    <?php endfor; ?>
    <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produtos = [];
    for ($i=0; $i<5; $i++) {
        $preco = $_POST['preco'][$i];
        if ($preco > 100) {
            $preco *= 0.9; 
        }
        $produtos[$_POST['codigo'][$i]] = [
            "nome" => $_POST['nome'][$i],
            "preco" => $preco
        ];
    }

    
    uasort($produtos, function($a, $b) {
        return strcmp($a['nome'], $b['nome']);
    });

    echo "<h3>Lista de produtos:</h3>";
    foreach ($produtos as $codigo => $info) {
        echo "Código: $codigo | Nome: {$info['nome']} | Preço: R$ " . number_format($info['preco'], 2, ',', '.') . "<br>";
    }
}
?>
</body>
</html>
