<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1></h1>
<form method="post">
    <?php for ($i=1; $i<=7; $i++): ?>
<div class="row inline-row mb-3"><div class="col-md-12">
              <label for="nums[]" class="form-label">Informe o <?= $i ?>° número:</label>
              <input type="number" id="nums[]" name="nums[]" class="form-control" required="">
            </div>
        <?php endfor; ?>
    </div>
<button type="submit" class="btn btn-primary">Verificar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nums = $_POST['nums'];
    $menor = min($nums);
    $pos = array_search($menor, $nums) + 1;
    echo "Menor valor: $menor<br>Posição: $pos";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>
</body>
</html>
