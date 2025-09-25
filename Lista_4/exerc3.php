<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex3 - Produtos</title></head>
<body>
<h2>3. Lista de produtos</h2>
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Produto <?= $i ?></h3>
        Código: <input type="text" name="codigo[]" required><br>
        Nome: <input type="text" name="nome[]" required><br>
        Preço: <input type="number" step="0.01" name="preco[]" required><br><br>
    <?php endfor; ?>
    <button type="submit">Salvar</button>
</form>
<?php
if ($_POST) {
    $produtos = [];
    for ($i=0; $i<5; $i++) {
        $preco = $_POST['preco'][$i];
        if ($preco > 100) {
            $preco *= 0.9; // desconto 10%
        }
        $produtos[$_POST['codigo'][$i]] = [
            "nome" => $_POST['nome'][$i],
            "preco" => $preco
        ];
    }

    // ordena pelo nome
    uasort($produtos, function($a, $b) {
        return strcmp($a['nome'], $b['nome']);
    });

    echo "<h3>Lista de produtos:</h3>";
    foreach ($produtos as $codigo => $info) {
        echo "Código: $codigo | Nome: {$info['nome']} | Preço: R$ " . number_format($info['preco'], 2, ',', '.') . "<br>";
    }
}
?>
</body>
</html>
