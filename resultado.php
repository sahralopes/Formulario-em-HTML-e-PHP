<?php
// Pega os valores enviados pelo formulário (POST)
$nome      = $_POST['nome']      ?? '';
$matricula = $_POST['matricula'] ?? '';
$nota1     = $_POST['nota1']     ?? '';
$nota2     = $_POST['nota2']     ?? '';

// Converte para número (float). Aceita vírgula ou ponto.
$nota1 = floatval(str_replace(',', '.', $nota1));
$nota2 = floatval(str_replace(',', '.', $nota2));

// Calcula a média
$media = ($nota1 + $nota2) / 2;

// Decide o status
if ($media >= 7) {
  $status = 'Aprovado';
} elseif ($media >= 4 && $media < 7) {
  $status = 'Prova Final';
} else {
  $status = 'Reprovado';
}

// Função pra escapar caracteres especiais no HTML
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Resultado</title>
</head>
<body>
  <h1>Resultado</h1>

  <p><strong>Nome do aluno:</strong> <?php echo h($nome); ?></p>
  <p><strong>Matrícula:</strong> <?php echo h($matricula); ?></p>
  <p><strong>Média:</strong> <?php echo number_format($media, 2, ',', '.'); ?></p>
  <p><strong>Status:</strong> <?php echo h($status); ?></p>

  <p><a href="formulario.html">Voltar ao formulário</a></p>
</body>
</html>
