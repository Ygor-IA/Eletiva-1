<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex17 - Juros Simples</title></head>
<body>
<h2>17. Juros simples</h2>
<form method="post">
    Capital: <input type="number" name="capital" step="0.01" required>
    Taxa (%): <input type="number" name="taxa" step="0.01" required>
    Período: <input type="number" name="tempo" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    $juros = $_POST['capital'] * ($_POST['taxa']/100) * $_POST['tempo'];
    echo "Juros simples: R$ " . number_format($juros, 2, ',', '.');
}
?>
</body>
</html>
