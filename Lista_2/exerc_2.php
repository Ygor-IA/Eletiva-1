<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>2. Soma (Triplo se iguais)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="a" class="form-label">Informe o Valor de A:</label>
              <input type="number" id="a" name="a" class="form-control" required="">
            </div><div class="col-md-6">
              <label for="b" class="form-label">Informe o Valor de B:</label>
              <input type="number" id="b" name="b" class="form-control" required="">
            </div></div> <center>
<button type="submit" class="btn btn-primary">Calcular</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $soma = $a + $b;
    echo ($a == $b) ? "Resultado: " . ($soma * 3) : "Resultado: $soma";
}
?>
</body>
</html>