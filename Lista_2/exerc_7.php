<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>7. Soma de 1 até N (while)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-12">
              <label for="n" class="form-label">Informe um número:</label>
              <input type="number" id="n" name="n" class="form-control" required="">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Verificar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['n']; $i=1; $soma=0;
    while ($i <= $n) {
        $soma += $i;
        $i++;
    }
    echo "Soma: $soma";
}
?>
</body>
</html>
