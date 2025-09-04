<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex10 - Perímetro Retângulo</title></head>
<body>
<h2>10. Perímetro do retângulo</h2>
<form method="post">
    Largura: <input type="number" name="largura" required>
    Altura: <input type="number" name="altura" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    echo "Perímetro: " . (2 * ($_POST['largura'] + $_POST['altura']));
}
?>
</body>
</html>
