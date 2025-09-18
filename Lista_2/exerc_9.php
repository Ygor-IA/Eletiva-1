<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex9</title></head>
<body>
<h2>9. Fatorial</h2>
<form method="post">
    Número: <input type="number" name="n" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    $n = $_POST['n']; $fat=1;
    for ($i=1; $i<=$n; $i++) {
        $fat *= $i;
    }
    echo "Fatorial: $fat";
}
?>
</body>
</html>
