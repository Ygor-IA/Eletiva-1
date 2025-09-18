<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex5</title></head>
<body>
<h2>5. Nome do mês</h2>
<form method="post">
    Mês (1 a 12): <input type="number" name="mes" min="1" max="12" required>
    <button type="submit">Verificar</button>
</form>
<?php
if ($_POST) {
    $mes = $_POST['mes'];
    switch($mes) {
        case 1: $nome="Janeiro"; break;
        case 2: $nome="Fevereiro"; break;
        case 3: $nome="Março"; break;
        case 4: $nome="Abril"; break;
        case 5: $nome="Maio"; break;
        case 6: $nome="Junho"; break;
        case 7: $nome="Julho"; break;
        case 8: $nome="Agosto"; break;
        case 9: $nome="Setembro"; break;
        case 10:$nome="Outubro"; break;
        case 11:$nome="Novembro"; break;
        case 12:$nome="Dezembro"; break;
        default:$nome="Mês inválido";
    }
    echo "Mês: $nome";
}
?>
</body>
</html>
