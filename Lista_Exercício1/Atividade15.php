<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>15. Calcular IMC</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Calcular IMC</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="peso" class="form-label">Informe seu Peso(kg):</label>
              <input type="number" id="peso" name="peso" class="form-control" required="" step="0.01">
            </div><div class="col-md-6">
              <label for="altura" class="form-label">Altura(m):</label>
              <input type="number" id="altura" name="altura" class="form-control" required=""step="0.01">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Calcular</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imc = $_POST['peso'] / pow($_POST['altura'], 2);
    echo "IMC: " . number_format($imc, 2);
}
?>
</body>
</html>
