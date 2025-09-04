<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex9 - Área do Círculo</title></head>
<body>
<h2>9. Área do círculo</h2>
<form method="post">
    Raio: <input type="number" name="raio" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    echo "Área: " . (pi() * pow($_POST['raio'], 2));
}
?>
</body>
</html>
