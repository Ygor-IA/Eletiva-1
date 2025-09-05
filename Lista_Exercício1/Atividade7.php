<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fahrenheit -> Celsius </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>7. Fahrenheit -> Celsius </h1>
<form method="post">
<div class="mb-3">
              <label for="temp" class="form-label">Informe a temperatura em Fahrenheit(ºF): </label>
              <input type="number" id="temp" name="temp" class="form-control" required="" step="0.01">
            </div>
            <center>
<button type="submit" class="btn btn-primary">Calcular</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<Center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Celsius: " . (($_POST['temp'] - 32) * 5/9);
}
?>
</body>
</html>
