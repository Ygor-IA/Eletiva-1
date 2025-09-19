<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex1</title></head>
<body>
<h2>1. Número de caracteres</h2>
<form method="post">
    Palavra: <input type="text" name="palavra" required>
    <button type="submit">Verificar</button>
</form>
<?php
function contarCaracteres($texto) {
    // função interna usada: strlen()
    return strlen($texto);
}

if ($_POST) {
    $palavra = $_POST['palavra'];
    echo "Número de caracteres: " . contarCaracteres($palavra);
}
?>
</body>
</html>
