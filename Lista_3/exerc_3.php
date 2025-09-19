<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex3</title></head>
<body>
<h2>3. Verificar se uma palavra está contida na outra</h2>
<form method="post">
    Palavra 1: <input type="text" name="p1" required><br>
    Palavra 2: <input type="text" name="p2" required><br>
    <button type="submit">Verificar</button>
</form>
<?php
function verificarSubstring($texto, $sub) {
    // função interna: strpos()
    return strpos($texto, $sub) !== false;
}

if ($_POST) {
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    if (verificarSubstring($p1, $p2)) {
        echo "A palavra \"$p2\" está contida em \"$p1\".";
    } else {
        echo "A palavra \"$p2\" NÃO está contida em \"$p1\".";
    }
}
?>
</body>
</html>
