<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8">
<title>Área do Círculo </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>9. Área do Círculo </h1>
<form method="post">
<div class="mb-3">
              <label for="raio" class="form-label">Informe o raio do círculo: </label>
              <input type="number" id="raio" name="raio" class="form-control" required="">
            </div>
            <center>
<button type="submit" class="btn btn-primary">Calcular Área</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<Center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Área: " . (pi() * pow($_POST['raio'], 2));
}
?>
</body>
</html>
