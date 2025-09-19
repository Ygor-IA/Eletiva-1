<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>4. Verificar data válida</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="dia" class="form-label">Informe o dia:</label>
              <input type="number" id="dia" name="dia" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="mes" class="form-label">Informe o Mês:</label>
              <input type="number" id="mes" name="mes" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="ano" class="form-label">Informe o Ano:</label>
              <input type="number" id="ano" name="ano" class="form-control" required="">
            </div></div>
            <div class="d-flex justify-content-center">
<button type="submit" class="btn btn-primary">Verificar</button>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<?php
function verificarData($d, $m, $a) {
    if (checkdate($m, $d, $a)) {
        return sprintf("%02d/%02d/%04d", $d, $m, $a);
    } else {
        return "Data inválida!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo verificarData($_POST['dia'], $_POST['mes'], $_POST['ano']);
}
?>
</body>
</html>
