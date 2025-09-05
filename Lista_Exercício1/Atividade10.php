<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8">
<title>Perímetro do retângulo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>10. Perímetro do retângulo</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="larg" class="form-label">Largura: </label>
              <input type="number" id="larg" name="larg" class="form-control" required="" step="0.01">
            </div><div class="col-md-6">
              <label for="alt" class="form-label">Altura: </label>
              <input type="number" id="alt" name="alt" class="form-control" required="" step="0.01">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Calcular Perímetro</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Perímetro: " . (2 * ($_POST['larg'] + $_POST['alt']));
}
?>
</body>
</html>
