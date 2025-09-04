<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex3 - Multiplicação</title></head>
<body>
<h2>3. Multiplicação</h2>
<form method="post">
    <input type="number" name="n1" required> ×
    <input type="number" name="n2" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    echo "Resultado: " . ($_POST['n1'] * $_POST['n2']);
}
?>
</body>
</html>