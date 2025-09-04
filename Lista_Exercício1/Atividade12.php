<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex12 - Potenciação</title></head>
<body>
<h2>12. Potenciação</h2>
<form method="post">
    Base: <input type="number" name="base" required>
    Expoente: <input type="number" name="exp" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    echo "Resultado: " . pow($_POST['base'], $_POST['exp']);
}
?>
</body>
</html>
