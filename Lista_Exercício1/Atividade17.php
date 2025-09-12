<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>17. Juros Simples</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="capital" class="form-label">Capital:</label>
              <input type="number" id="capital" name="capital" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="taxa" class="form-label">Taxa (%):</label>
              <input type="number" id="taxa" name="taxa" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="tempo" class="form-label">Período:</label>
              <input type="number" id="tempo" name="tempo" class="form-control" required="">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Calcular</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $juros = $_POST['capital'] * ($_POST['taxa']/100) * $_POST['tempo'];
    echo "Juros simples: R$ " . number_format($juros, 2, ',', '.');
}
?>
</body>
</html>
