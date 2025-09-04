<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex6 - Celsius para Fahrenheit</title></head>
<body>
<h2>6. Converter Celsius para Fahrenheit</h2>
<form method="post">
    <input type="number" name="c" step="0.1" required> °C
    <button type="submit">Converter</button>
</form>
<?php
if ($_POST) {
    echo "Fahrenheit: " . (($_POST['c'] * 9/5) + 32);
}
?>
</body>
</html>
