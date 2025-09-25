<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>5. Estoque de livros</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Livro <?= $i ?></h3>
        <div class="row inline-row mb-3"><div class="col-md-6">
              <label for="titulo[]" class="form-label">Informe O título do livro:</label>
              <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">
            </div><div class="col-md-6">
              <label for="estoque[]" class="form-label">Informe o Estoque:</label>
              <input type="number" id="estoque[]" name="estoque[]" class="form-control" required="">
            </div></div>
    <?php endfor; ?>
    <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $livros = [];
    for ($i=0; $i<5; $i++) {
        $livros[$_POST['titulo'][$i]] = $_POST['estoque'][$i];
    }

    ksort($livros);

    echo "<h3>Lista de livros:</h3>";
    foreach ($livros as $titulo => $qtd) {
        echo "$titulo → Estoque: $qtd";
        if ($qtd < 5) {
            echo " ⚠️ Baixa quantidade!";
        }
        echo "<br>";
    }
}
?>
</body>
</html>
