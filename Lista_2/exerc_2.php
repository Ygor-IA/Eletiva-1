<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex2</title></head>
<body>
<h2>2. Soma (triplo se iguais)</h2>
<form method="post">
    A: <input type="number" name="a" required>
    B: <input type="number" name="b" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $soma = $a + $b;
    echo ($a == $b) ? "Resultado: " . ($soma * 3) : "Resultado: $soma";
}
?>
</body>
</html>