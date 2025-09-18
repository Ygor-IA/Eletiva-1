<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex1</title></head>
<body>
<h2>1. Menor valor e posição</h2>
<form method="post">
    <?php for ($i=1; $i<=7; $i++): ?>
        Número <?= $i ?>: <input type="number" name="nums[]" required><br>
    <?php endfor; ?>
    <button type="submit">Verificar</button>
</form>
<?php
if ($_POST) {
    $nums = $_POST['nums'];
    $menor = min($nums);
    $pos = array_search($menor, $nums) + 1;
    echo "Menor valor: $menor<br>Posição: $pos";
}
?>
</body>
</html>
