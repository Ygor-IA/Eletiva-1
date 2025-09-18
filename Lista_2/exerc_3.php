<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex3</title></head>
<body>
<h2>3. Ordem crescente</h2>
<form method="post">
    A: <input type="number" name="a" required>
    B: <input type="number" name="b" required>
    <button type="submit">Verificar</button>
</form>
<?php
if ($_POST) {
    $a = $_POST['a']; $b = $_POST['b'];
    if ($a == $b) {
        echo "Números iguais: $a";
    } else {
        $arr = [$a, $b];
        sort($arr);
        echo implode(" ", $arr);
    }
}
?>
</body>
</html>
