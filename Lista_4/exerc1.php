</body>
</html>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>1. Lista de Contatos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Contato <?= $i ?></h3>
        <div class="row inline-row mb-3"><div class="col-md-6">
              <label for="nome[]" class="form-label">Informe seu nome:</label>
              <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
            </div><div class="col-md-6">
              <label for="tel[]" class="form-label">Informe seu telefone:</label>
              <input type="number" id="tel[]" name="tel[]" class="form-control" required="">
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
    $nomes = $_POST['nome'];
    $tels = $_POST['tel'];
    $contatos = [];

    for ($i=0; $i<5; $i++) {
        $nome = trim($nomes[$i]);
        $tel = trim($tels[$i]);

        if (isset($contatos[$nome]) || in_array($tel, $contatos)) {
            echo "Contato duplicado ignorado: $nome - $tel<br>";
        } else {
            $contatos[$nome] = $tel;
        }
    }

    ksort($contatos);
    echo "<h3>Lista de contatos:</h3>";
    foreach ($contatos as $nome => $tel) {
        echo "$nome → $tel<br>";
    }
}
?>
</body>
</html>
