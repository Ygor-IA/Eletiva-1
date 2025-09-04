<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex20 - Velocidade Média</title></head>
<body>
<h2>20. Velocidade média</h2>
<form method="post">
    Distância (km): <input type="number" name="dist" step="0.01" required>
    Tempo (h): <input type="number" name="tempo" step="0.01" required>
    <button type="submit">Calcular</button>
</form>
<?php
if ($_POST) {
    if ($_POST['tempo'] == 0) {
        echo "Erro: tempo não pode ser zero.";
    } else {
        $vm = $_POST['dist'] / $_POST['tempo'];
        echo "Velocidade média: " . number_format($vm, 2, ',', '.') . " km/h";
    }
}
?>
</body>
</html>
