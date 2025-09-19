<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>9. Fatorial</title>
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
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>
<Center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = $_POST['n']; $fat=1;
    for ($i=1; $i<=$n; $i++) {
        $fat *= $i;
    }
    echo "Fatorial: $fat";
}
?>
</body>
</html>
