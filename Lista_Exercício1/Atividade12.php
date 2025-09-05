<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>12. Potenciação</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>12. Potenciação</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="base" class="form-label">Base:</label>
              <input type="number" id="base" name="base" class="form-control" required="" step="0.01">
            </div><div class="col-md-6">
              <label for="exp" class="form-label">Expoente:</label>
              <input type="number" id="exp" name="exp" class="form-control" required="" step="0.01">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Calcular Potência</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Resultado: " . pow($_POST['base'], $_POST['exp']);
}
?>
</body>
</html>
