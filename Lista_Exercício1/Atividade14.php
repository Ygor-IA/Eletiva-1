<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8">
<title>14. Quilômetros para Milhas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>14. Quilômetros para Milhas</h1>
<form method="post">
<div class="mb-3">
              <label for="km" class="form-label">Insira a quantidade de quilômetros (km):</label>
              <input type="number" id="km" name="km" class="form-control" required="">
            </div>
            <center>
<button type="submit" class="btn btn-primary">Converter</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Milhas: " . ($_POST['km'] * 0.621371);
}
?>
</body>
</html>
