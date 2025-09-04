<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex1 - Soma</title></head>
<body>
<h2>1. Soma de dois números</h2>
<form method="post">
    <input type="num" name="n1" required> +
    <input type="num" name="n2" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Resultado: " . ($_POST['n1'] + $_POST['n2']);
}
?>
</body>
</html>
