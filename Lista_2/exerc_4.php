<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>4. Preço com desconto se > 100</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-12">
              <label for="valor" class="form-label">Valor do Produto: </label>
              <input type="number" id="valor" name="valor" class="form-control" required="">
            </div></div>
            <div class="d-flex justify-content-center">
<button type="submit" class="btn btn-primary">Calcular</button>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = $_POST['valor'];
    if ($valor > 100) {
        $valor -= $valor * 0.15;
    }
    echo "Valor final: R$ " . number_format($valor, 2, ',', '.');
}
?>
</body>
</html>
