<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>13. Metros para Centímetros</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>13. Metros para Centímetros</h1>
<form method="post">
<div class="mb-3">
              <label for="metros" class="form-label">Insira a quantidade de metros (m):</label>
              <input type="number" id="metros" name="metros" class="form-control" required="">
            </div>
            <center>
<button type="submit" class="btn btn-primary">Converter</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Centímetros: " . ($_POST['metros'] * 100) . " cm";
}
?>
</body>
</html>
