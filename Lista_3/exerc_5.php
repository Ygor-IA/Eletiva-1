<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex5</title></head>
<body>
<h2>5. Raiz quadrada</h2>
<form method="post">
    Número: <input type="number" name="num" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
function raizQuadrada($n) {
    // função interna: sqrt()
    return sqrt($n);
}

if ($_POST) {
    echo "Raiz quadrada: " . raizQuadrada($_POST['num']);
}
?>
</body>
</html>
