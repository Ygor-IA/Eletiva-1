<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>1. Soma de dois números</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>1. Soma de dois números</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="num1" class="form-label">Digite um número: </label>
              <input type="number" id="num1" name="num1" class="form-control" required="">
            </div><div class="col-md-6">
              <label for="num2" class="form-label">Digite um número: </label>
              <input type="number" id="num2" name="num2" class="form-control" required="">
            </div></div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Resultado: " . ($_POST['num1'] + $_POST['num2']);
}
?>
</center>
</body>
</html>
