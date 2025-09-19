<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex2</title></head>
<body>
<h2>2. Maiúsculo e minúsculo</h2>
<form method="post">
    Palavra: <input type="text" name="palavra" required>
    <button type="submit">Transformar</button>
</form>
<?php
function transformarTexto($texto) {
    // funções internas: strtoupper() e strtolower()
    return "Maiúsculo: " . strtoupper($texto) . "<br>" .
           "Minúsculo: " . strtolower($texto);
}

if ($_POST) {
    echo transformarTexto($_POST['palavra']);
}
?>
</body>
</html>
