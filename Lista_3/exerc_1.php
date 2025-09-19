<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>1. Número de caracteres</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-12">
              <label for="palavra" class="form-label">Digite uma palavra:</label>
              <input type="text" id="palavra" name="palavra" class="form-control" required="">
            </div></div>
            <div class="d-flex justify-content-center">
<button type="submit" class="btn btn-primary">Verificar</button>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
function contarCaracteres($texto) {
    return strlen($texto);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $palavra = $_POST['palavra'];
    echo "Número de caracteres: " . contarCaracteres($palavra);
}
?>
</body>
</html>
