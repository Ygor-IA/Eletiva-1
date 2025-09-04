<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex16 - Desconto</title></head>
<body>
<h2>16. Preço com desconto</h2>
<form method="post">
    Preço: <input type="number" name="preco" step="0.01" required>
    Desconto (%): <input type="number" name="desc" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    $preco = $_POST['preco'];
    $desconto = $_POST['desc'];
    $final = $preco - ($preco * ($desconto / 100));
    echo "Preço com desconto: R$ " . number_format($final, 2, ',', '.');
}
?>
</body>
</html>
