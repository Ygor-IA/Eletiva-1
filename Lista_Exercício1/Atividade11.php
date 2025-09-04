<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex11 - Perímetro Círculo</title></head>
<body>
<h2>11. Perímetro do círculo</h2>
<form method="post">
    Raio: <input type="number" name="raio" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    echo "Perímetro: " . (2 * pi() * $_POST['raio']);
}
?>
</body>
</html>
