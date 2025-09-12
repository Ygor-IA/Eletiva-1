<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>16. Preço com desconto</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>16. Preço com desconto</h1>
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="preco" class="form-label">Preço:</label>
              <input type="number" id="preco" name="preco" class="form-control" required="">
            </div><div class="col-md-6">
              <label for="desconto" class="form-label">Desconto (%):</label>
              <input type="number" id="desconto" name="desconto" class="form-control" required="">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $preco = $_POST['preco'];
    $desconto = $_POST['desc'];
    $final = $preco - ($preco * ($desconto / 100));
    echo "Preço com desconto: R$ " . number_format($final, 2, ',', '.');
}
?>
</body>
</html>
