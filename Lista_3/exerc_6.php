<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex6</title></head>
<body>
<h2>6. Arredondar número</h2>
<form method="post">
    Número: <input type="number" name="num" step="0.0001" required>
    <button type="submit">Arredondar</button>
</form>
<?php
function arredondar($n) {
    // função interna: round()
    return round($n);
}

if ($_POST) {
    echo "Número arredondado: " . arredondar($_POST['num']);
}
?>
</body>
</html>
