<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex5 - Livros</title></head>
<body>
<h2>5. Estoque de livros</h2>
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Livro <?= $i ?></h3>
        Título: <input type="text" name="titulo[]" required>
        Estoque: <input type="number" name="estoque[]" required><br><br>
    <?php endfor; ?>
    <button type="submit">Salvar</button>
</form>
<?php
if ($_POST) {
    $livros = [];
    for ($i=0; $i<5; $i++) {
        $livros[$_POST['titulo'][$i]] = $_POST['estoque'][$i];
    }

    ksort($livros); // ordena por título

    echo "<h3>Lista de livros:</h3>";
    foreach ($livros as $titulo => $qtd) {
        echo "$titulo → Estoque: $qtd";
        if ($qtd < 5) {
            echo " ⚠️ Baixa quantidade!";
        }
        echo "<br>";
    }
}
?>
</body>
</html>
