<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>5. Raiz Quadrada</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-12">
              <label for="num" class="form-label">Informe um Número:</label>
              <input type="number" id="num" name="num" class="form-control" required="">
            </div></div>
            <div class="d-flex justify-content-center">
<button type="submit" class="btn btn-primary">Calcular</button>
</div>
</form>
<center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<?php
function raizQuadrada($n) {
    return sqrt($n);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Raiz quadrada: " . raizQuadrada($_POST['num']);
}
?>
</body>
</html>
