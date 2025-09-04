<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex4 - Divisão</title></head>
<body>
<h2>4. Divisão</h2>
<form method="post">
    <input type="number" name="n1" required> ÷
    <input type="number" name="n2" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    if ($_POST['n2'] == 0) {
        echo "Erro: divisão por zero não é permitida.";
    } else {
        echo "Resultado: " . ($_POST['n1'] / $_POST['n2']);
    }
}
?>
</body>
</html>
