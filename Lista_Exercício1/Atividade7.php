<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex7 - Fahrenheit para Celsius</title></head>
<body>
<h2>7. Converter Fahrenheit para Celsius</h2>
<form method="post">
    <input type="number" name="f" step="0.1" required> °F
    <button type="submit">Converter</button>
</form>
<?php
if ($_POST) {
    echo "Celsius: " . (($_POST['f'] - 32) * 5/9);
}
?>
</body>
</html>
