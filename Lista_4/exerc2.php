<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex2 - Alunos</title></head>
<body>
<h2>2. Médias dos alunos</h2>
<form method="post">
    <?php for ($i=1; $i<=5; $i++): ?>
        <h3>Aluno <?= $i ?></h3>
        Nome: <input type="text" name="nome[]" required><br>
        Nota 1: <input type="number" step="0.01" name="n1[]" required><br>
        Nota 2: <input type="number" step="0.01" name="n2[]" required><br>
        Nota 3: <input type="number" step="0.01" name="n3[]" required><br><br>
    <?php endfor; ?>
    <button type="submit">Salvar</button>
</form>
<?php
if ($_POST) {
    $alunos = [];
    for ($i=0; $i<5; $i++) {
        $media = ($_POST['n1'][$i] + $_POST['n2'][$i] + $_POST['n3'][$i]) / 3;
        $alunos[$_POST['nome'][$i]] = $media;
    }

    arsort($alunos); // ordena por média (descendente)
    echo "<h3>Lista de alunos:</h3>";
    foreach ($alunos as $nome => $media) {
        echo "$nome → Média: " . number_format($media, 2, ',', '.') . "<br>";
    }
}
?>
</body>
</html>
