<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex18 - Juros Compostos</title></head>
<body>
<h2>18. Juros compostos</h2>
<form method="post">
    Capital: <input type="number" name="capital" step="0.01" required>
    Taxa (%): <input type="number" name="taxa" step="0.01" required>
    Período: <input type="number" name="tempo" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    $montante = $_POST['capital'] * pow((1 + ($_POST['taxa']/100)), $_POST['tempo']);
    echo "Montante: R$ " . number_format($montante, 2, ',', '.');
}
?>
</body>
</html>
