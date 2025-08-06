<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - TeleEntrega</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap e Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0047AB 0%, #ffffff 50%, #FF3C3C 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .login-container {
      max-width: 420px;
      width: 100%;
      padding: 20px;
      z-index: 10;
    }

    .login-card {
      background: #fff;
      border-radius: 24px;
      padding: 3rem 2rem;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .logo {
      width: 80px;
      height: 80px;
      /*background: linear-gradient(135deg, #ffffff 0%, #0047AB 40%, #FF3C3C 60%, #ffffff 100%); */
      background-color: #0047AB;
      color: #fff;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
    }

    .logo i {
      font-size: 2rem;
      color: #fff;
    }

    .logo-text {
      font-size: 1.8rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 0.25rem;
      color: #1f2937;
    }

    .logo-subtitle {
      font-size: 0.95rem;
      text-align: center;
      color: #6b7280;
      margin-bottom: 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    .form-label {
      font-weight: 600;
      color: #1f2937;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }

    .input-group {
      position: relative;
    }

    .input-group .form-control {
      padding-left: 2.75rem;
      padding-right: 2.75rem;
      border-radius: 12px;
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.9);
    }

    .form-icon {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #6b7280;
      font-size: 1.1rem;
      z-index: 2;
      pointer-events: none;
    }

    .password-toggle {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #6b7280;
      cursor: pointer;
      z-index: 10;
      padding: 0;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.9rem;
      margin-bottom: 1.5rem;
    }

    .forgot-password {
      color: #4f7cff;
      font-weight: 500;
      text-decoration: none;
    }

    .btn-login {
      width: 100%;
      /* background: linear-gradient(135deg, #ffffff 0%, #0047AB 40%, #FF3C3C 60%, #ffffff 100%); */
      background-color: #0047AB;
      color: #fff;
      border: none;
      border-radius: 12px;
      padding: 0.875rem 1.5rem;
      font-weight: 600;
      font-size: 1rem;
      color: #fff;
    }

    .alert {
      border-radius: 12px;
      border: none;
      padding: 1rem 1.25rem;
      margin-bottom: 1.5rem;
      font-weight: 500;
    }

    .alert-danger {
      background: rgba(239, 68, 68, 0.1);
      color: #ef4444;
      border-left: 4px solid #ef4444;
    }

    .footer-links {
      text-align: center;
      margin-top: 2rem;
      font-size: 0.85rem;
    }

    .footer-links a {
      color: #6b7280;
      margin: 0 1rem;
      text-decoration: none;
    }

    .footer-links a:hover {
      color: #4f7cff;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-card">
      <div class="logo"><i class="fas fa-truck-fast"></i></div>
      <h1 class="logo-text">TeleEntrega</h1>
      <p class="logo-subtitle">Sistema de Gestão</p>

      <?php if (!empty($_SESSION['loginErro'])): ?>
        <div class="alert alert-danger text-center">
          <i class="fas fa-exclamation-triangle me-2"></i>
          <?= $_SESSION['loginErro']; unset($_SESSION['loginErro']); ?>
        </div>
      <?php endif; ?>

      <form method="post" action="/teapp/login/autenticaract">
        <div class="form-group">
          <label for="cpf" class="form-label">CPF</label>
          <div class="input-group">
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
            <i class="form-icon fas fa-user"></i>
          </div>
        </div>

        <div class="form-group">
          <label for="senha" class="form-label">Senha</label>
          <div class="input-group">
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
            <i class="form-icon fas fa-lock"></i>
            <button type="button" class="password-toggle" id="togglePassword"><i class="fas fa-eye"></i></button>
          </div>
        </div>

        <div class="remember-forgot">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">Lembrar-me</label>
          </div>
          <a href="#" class="forgot-password">Esqueceu a senha?</a>
        </div>

        <button type="submit" class="btn btn-login" id="loginBtn">
          <span id="btnText">Entrar</span>
        </button>
      </form>

      <div class="footer-links">
        <a href="#">Suporte</a>
        <a href="#">Termos de Uso</a>
        <a href="#">Privacidade</a>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordField = document.getElementById('senha');
      const toggleIcon = this.querySelector('i');

      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    });

    const form = document.querySelector('form');
    const btn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');

    if (form && btn && btnText) {
      form.addEventListener('submit', function () {
        btn.disabled = true;
        btnText.textContent = 'Entrando...';
      });
    }
  </script>
</body>
</html>
