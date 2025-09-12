<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>20. Velocidade média</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-6">
              <label for="dist" class="form-label">Distância (km):</label>
              <input type="number" id="dist" name="dist" class="form-control" required="">
            </div><div class="col-md-6">
              <label for="tempo" class="form-label">Tempo (h):</label>
              <input type="number" id="tempo" name="tempo" class="form-control" required="">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Calcular</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if ($_POST['tempo'] == 0) {
        echo "Erro: tempo não pode ser zero.";
    } else {
        $vm = $_POST['dist'] / $_POST['tempo'];
        echo "Velocidade média: " . number_format($vm, 2, ',', '.') . " km/h";
    }
}
?>
</body>
</html>
