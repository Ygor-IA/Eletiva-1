<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>3. Verificar se uma palavra está contida na outra</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="p1" class="form-label">Informe uma palavra:</label>
              <input type="text" id="p1" name="p1" class="form-control" required="">
            </div><div class="col-md-6">
              <label for="p2" class="form-label">Informe uma palavra:</label>
              <input type="text" id="p2" name="p2" class="form-control" required="">
            </div></div>
            <center>
            <div class="d-flex justify-content-center">
<button type="submit" class="btn btn-primary">Verificar</button>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</form>
<center>
<?php
function verificarSubstring($texto, $sub) {
    return strpos($texto, $sub) !== false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    if (verificarSubstring($p1, $p2)) {
        echo "A palavra \"$p2\" está contida em \"$p1\".";
    } else {
        echo "A palavra \"$p2\" NÃO está contida em \"$p1\".";
    }
}
?>
</body>
</html>
