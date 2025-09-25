<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex1 - Contatos</title></head>
<body>
<h2>1. Lista de contatos</h2>
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Contato <?= $i ?></h3>
        Nome: <input type="text" name="nome[]" required>
        Telefone: <input type="text" name="tel[]" required><br><br>
    <?php endfor; ?>
    <button type="submit">Salvar</button>
</form>
<?php
if ($_POST) {
    $nomes = $_POST['nome'];
    $tels = $_POST['tel'];
    $contatos = [];

    for ($i=0; $i<5; $i++) {
        $nome = trim($nomes[$i]);
        $tel = trim($tels[$i]);

        if (isset($contatos[$nome]) || in_array($tel, $contatos)) {
            echo "Contato duplicado ignorado: $nome - $tel<br>";
        } else {
            $contatos[$nome] = $tel;
        }
    }

    ksort($contatos); // ordena por nome
    echo "<h3>Lista de contatos:</h3>";
    foreach ($contatos as $nome => $tel) {
        echo "$nome → $tel<br>";
    }
}
?>
</body>
</html>
