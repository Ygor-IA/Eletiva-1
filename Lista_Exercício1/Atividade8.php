<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex8 - Área do Retângulo</title></head>
<body>
<h2>8. Área do retângulo</h2>
<form method="post">
    Largura: <input type="number" name="largura" required>
    Altura: <input type="number" name="altura" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    echo "Área: " . ($_POST['largura'] * $_POST['altura']);
}
?>
</body>
</html>
