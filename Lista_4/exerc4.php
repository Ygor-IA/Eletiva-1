<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex4 - Itens</title></head>
<body>
<h2>4. Itens com imposto</h2>
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Item <?= $i ?></h3>
        Nome: <input type="text" name="nome[]" required>
        Preço: <input type="number" step="0.01" name="preco[]" required><br><br>
    <?php endfor; ?>
    <button type="submit">Salvar</button>
</form>
<?php
if ($_POST) {
    $itens = [];
    for ($i=0; $i<5; $i++) {
        $preco = $_POST['preco'][$i] * 1.15; // imposto de 15%
        $itens[$_POST['nome'][$i]] = $preco;
    }

    // ordena pelos preços
    asort($itens);

    echo "<h3>Lista de itens:</h3>";
    foreach ($itens as $nome => $preco) {
        echo "$nome → R$ " . number_format($preco, 2, ',', '.') . "<br>";
    }
}
?>
</body>
</html>
