<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex4</title></head>
<body>
<h2>4. Preço com desconto se > 100</h2>
<form method="post">
    Valor do produto: <input type="number" name="valor" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    $valor = $_POST['valor'];
    if ($valor > 100) {
        $valor -= $valor * 0.15;
    }
    echo "Valor final: R$ " . number_format($valor, 2, ',', '.');
}
?>
</body>
</html>
