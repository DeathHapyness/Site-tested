<?php
session_start();

// Simulação de login (em produção, use validação real)
if (isset($_POST['login'])) {
    // Defina os dados do usuário após o login
    $_SESSION['usuario'] = [
        'nome' => 'Henrique',
        'foto' => 'https://i.pravatar.cc/40?img=3' // Exemplo de avatar
    ];
    header('Location: index.php');
    exit();
}

// Logout (opcional)
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Página Inicial</title>
  <style>
    .perfil {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 20px;
    }
    .perfil img {
      border-radius: 50%;
      width: 40px;
      height: 40px;
    }
    .perfil span {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php if (empty($_SESSION['usuario'])): ?>
    <form method="post">
      <button type="submit" name="login">Login</button>
    </form>
  <?php else: ?>
    <div class="perfil">
      <img src="<?php echo $_SESSION['usuario']['foto']; ?>" alt="Foto de perfil">
      <span><?php echo $_SESSION['usuario']['nome']; ?></span>
      <a href="?logout=1" style="margin-left:15px;">Sair</a>
    </div>
  <?php endif; ?>
</body>
</html>
