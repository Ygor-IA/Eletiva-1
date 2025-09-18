<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex10</title></head>
<body>
<h2>10. Tabuada de N</h2>
<form method="post">
    Número: <input type="number" name="n" required>
    <button type="submit">Gerar</button>
</form>
<?php
if ($_POST) {
    $n = $_POST['n'];
    for ($i=1; $i<=10; $i++) {
        echo "$n x $i = " . ($n*$i) . "<br>";
    }
}
?>
</body>
</html>
