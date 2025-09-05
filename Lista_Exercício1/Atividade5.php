<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>5. Média de 3 notas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>5. Média de 3 notas</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-4">
              <label for="nota1" class="form-label">Digite a primeira nota:</label>
              <input type="number" id="nota1" name="nota1" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="nota2" class="form-label">Digite a segunda nota:</label>
              <input type="number" id="nota2" name="nota2" class="form-control" required="">
            </div><div class="col-md-4">
              <label for="nota3" class="form-label">Digite a terceira nota:</label>
              <input type="number" id="nota3" name="nota3" class="form-control" required="">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Média</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Média: " . (($_POST['nota1'] + $_POST['nota2'] + $_POST['nota3']) / 3);
}
?>
</body>
</html>
