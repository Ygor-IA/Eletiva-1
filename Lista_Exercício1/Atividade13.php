<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex13 - Metros para cm</title></head>
<body>
<h2>13. Metros para centímetros</h2>
<form method="post">
    <input type="number" name="m" step="0.01" required> m
    <button type="submit">Converter</button>
</form>
<?php
if ($_POST) {
    echo "Centímetros: " . ($_POST['m'] * 100) . " cm";
}
?>
</body>
</html>
