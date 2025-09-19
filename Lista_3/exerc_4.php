<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex4</title></head>
<body>
<h2>4. Verificar data válida</h2>
<form method="post">
    Dia: <input type="number" name="dia" min="1" max="31" required>
    Mês: <input type="number" name="mes" min="1" max="12" required>
    Ano: <input type="number" name="ano" required>
    <button type="submit">Verificar</button>
</form>
<?php
function verificarData($d, $m, $a) {
    // função interna: checkdate()
    if (checkdate($m, $d, $a)) {
        return sprintf("%02d/%02d/%04d", $d, $m, $a);
    } else {
        return "Data inválida!";
    }
}

if ($_POST) {
    echo verificarData($_POST['dia'], $_POST['mes'], $_POST['ano']);
}
?>
</body>
</html>
