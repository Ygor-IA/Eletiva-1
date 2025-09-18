<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex6</title></head>
<body>
<h2>6. Imprimir de 1 até N (for)</h2>
<form method="post">
    Número: <input type="number" name="n" required>
    <button type="submit">Imprimir</button>
</form>
<?php
if ($_POST) {
    $n = $_POST['n'];
    for ($i=1; $i<=$n; $i++) {
        echo $i . " ";
    }
}
?>
</body>
</html>
