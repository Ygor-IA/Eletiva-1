<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex5 - Média</title></head>
<body>
<h2>5. Média de três notas</h2>
<form method="post">
    <input type="number" name="n1" step="0.01" required>
    <input type="number" name="n2" step="0.01" required>
    <input type="number" name="n3" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    echo "Média: " . (($_POST['n1'] + $_POST['n2'] + $_POST['n3']) / 3);
}
?>
</body>
</html>
