<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>2. Média dos alunos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Aluno <?= $i ?></h3>
        <div class="row inline-row mb-3"><div class="col-md-3">
              <label for="nome[]" class="form-label">Nome do aluno:</label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="col-md-3">
              <label for="n1[]" class="form-label">Nota 1:</label>
              <input type="number" id="n1[]" name="n1[]" class="form-control" required="" step="0.01">
            </div><div class="col-md-3">
              <label for="n2[]" class="form-label">Nota 2:</label>
              <input type="number" id="n2[]" name="n2[]" class="form-control" required="" step="0.01">
            </div>
            <div class="col-md-3">
            <label for="n3[]" class="form-label">Nota 3:</label>
              <input type="number" id="n3[]" name="n3[]" class="form-control" required="" step="0.01">
            </div></div>
            
    <?php endfor; ?>
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
  </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>  
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alunos = [];
    for ($i=0; $i<5; $i++) {
        $media = ($_POST['n1'][$i] + $_POST['n2'][$i] + $_POST['n3'][$i]) / 3;
        $alunos[$_POST['nome'][$i]] = $media;
    }

    arsort($alunos);
    echo "<h3>Lista de alunos:</h3>";
    foreach ($alunos as $nome => $media) {
        echo "$nome → Média: " . number_format($media, 2, ',', '.') . "<br>";
    }
}
?>
</body>
</html>
