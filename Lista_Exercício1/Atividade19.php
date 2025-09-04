<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex19 - Dias para H/M/S</title></head>
<body>
<h2>19. Converter dias em horas, minutos e segundos</h2>
<form method="post">
    Dias: <input type="number" name="dias" required>
    <button type="submit">Converter</button>
</form>
<?php
if ($_POST) {
    $dias = $_POST['dias'];
    $horas = $dias * 24;
    $minutos = $horas * 60;
    $segundos = $minutos * 60;
    echo "$dias dias = $horas horas = $minutos minutos = $segundos segundos";
}
?>
</body>
</html>
