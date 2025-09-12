<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>19. Converter dias em horas, minutos e segundos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3">
        <div class="col-md-12">
              <label for="dias" class="form-label">Dias: </label>
              <input type="number" id="dias" name="dias" class="form-control" required="" step="0.01">
        </div>
</div>
<center>
<button type="submit" class="btn btn-primary">Converter</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $dias = $_POST['dias'];
    $horas = $dias * 24;
    $minutos = $horas * 60;
    $segundos = $minutos * 60;
    echo "$dias dias = $horas horas = $minutos minutos = $segundos segundos";
}
?>
</body>
</html>
