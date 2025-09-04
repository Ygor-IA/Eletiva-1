<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex15 - IMC</title></head>
<body>
<h2>15. Cálculo do IMC</h2>
<form method="post">
    Peso (kg): <input type="number" name="peso" step="0.1" required>
    Altura (m): <input type="number" name="altura" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    $imc = $_POST['peso'] / pow($_POST['altura'], 2);
    echo "IMC: " . number_format($imc, 2);
}
?>
</body>
</html>
