<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex7</title></head>
<body>
<h2>7. Soma de 1 até N (while)</h2>
<form method="post">
    Número: <input type="number" name="n" required>
    <button type="submit">Somar</button>
</form>
<?php
if ($_POST) {
    $n = $_POST['n']; $i=1; $soma=0;
    while ($i <= $n) {
        $soma += $i;
        $i++;
    }
    echo "Soma: $soma";
}
?>
</body>
</html>
