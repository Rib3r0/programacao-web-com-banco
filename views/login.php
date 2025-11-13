<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PodCast+</title>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="./style-views.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="./player.js" defer></script>
</head>

<body>
    <header>
        <div class="header-container">
            <a href="../index.php" class="logo-card">
                <i class="fi fi-sr-microphone logo-icon"></i>
                <h1 class="logo-text">PodCast+</h1>
            </a>
        </div>
    </header>

    <main class="cadastro-container">
        <div class="cadastro-card">
            <h2 class="cadastro-title">Login</h2>
            <form action="../php/login.php" method="POST" class="cadastro-form">
                <div class="form-group">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" name="usuario" id="usuario" class="form-input" placeholder="Digite seu usuário" required>
                </div>
                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-input" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" class="cadastro-btn">Login</button>
            </form>
            <div class="login-link">
                <p>Não tem uma conta? <a href="register.php">Cadastre-se</a></p>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <p>
                Feito por Eduardo Ribeiro 🦝 e Italo Sampaio 🐈‍⬛ |
                Uicons do <a href="https://www.flaticon.com/uicons" target="_blank" rel="noopener">Flaticon</a>
            </p>
        </div>
    </footer>


</body>

</html>