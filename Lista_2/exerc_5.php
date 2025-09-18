<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>5. Nome do mês</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<form method="post">
<div class="row inline-row mb-3"><div class="col-md-12">
              <label for="mes" class="form-label">Informe o Mês (1 a 12):</label>
              <input type="number" id="mes" name="mes" class="form-control" required="">
            </div></div>
            <center>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
<center>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mes = $_POST['mes'];
    switch($mes) {
        case 1: $nome="Janeiro"; break; 
        case 2: $nome="Fevereiro"; break;
        case 3: $nome="Março"; break;
        case 4: $nome="Abril"; break;
        case 5: $nome="Maio"; break;
        case 6: $nome="Junho"; break;
        case 7: $nome="Julho"; break;
        case 8: $nome="Agosto"; break;
        case 9: $nome="Setembro"; break;
        case 10:$nome="Outubro"; break;
        case 11:$nome="Novembro"; break;
        case 12:$nome="Dezembro"; break;
        default:$nome="Mês inválido";
    }
    echo "Mês: $nome";
}
?>
</body>
</html>
