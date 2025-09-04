<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Ex14 - Km para milhas</title></head>
<body>
<h2>14. Km para milhas</h2>
<form method="post">
    <input type="number" name="km" step="0.01" required> km
    <button type="submit">Converter</button>
</form>
<?php
if ($_POST) {
    echo "Milhas: " . ($_POST['km'] * 0.621371);
}
?>
</body>
</html>
