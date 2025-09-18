<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex8</title></head>
<body>
<h2>8. Contagem regressiva (do-while)</h2>
<form method="post">
    Número: <input type="number" name="n" required>
    <button type="submit">Contar</button>
</form>
<?php
if ($_POST) {
    $n = $_POST['n'];
    do {
        echo $n . " ";
        $n--;
    } while ($n >= 1);
}
?>
</body>
</html>
