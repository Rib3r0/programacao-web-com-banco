<?php
include("./php/connection.php");
$sql = "SELECT * FROM podcast LIMIT 3";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="./main.js" defer></script>
    <title>PodCast+ | Seu próximo podcast favorito está aqui!</title>
</head>

<body>

    <header id="header">
        <div class="header-container">
            <div id="logo" class="logo">
                <a href="#" class="logo-card">
                    <i class="fi fi-sr-microphone logo-icon"></i>
                    <h1 class="logo-text">PodCast+</h1>
                </a>
            </div>
            <nav id='nav-container'>
                <div id='autenticacao' class='autenticacao'>
                    <a href="./views/login.php" class="btn btn-secondary">Login</a>
                    <a href="./views/register.php" class="btn btn-primary">Cadastro</a>
                </div>
                <ul id='nav' class="nav-menu">
                    <li><a href="#inicio" class="nav-link">Início</a></li>
                    <li><a href="#recursos" class="nav-link">Recursos</a></li>
                    <li><a href="#destaques" class="nav-link">Destaques</a></li>
                    <li><a href="#comunidade" class="nav-link">Comunidade</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- introducao -->
        <section id="inicio" class="hero">
            <div class="hero-content">
                <h2 class="hero-title">Seu próximo podcast favorito está aqui!</h2>
                <div class="hero-text">
                    <p>
                        Se junte a mais de <strong>100mil</strong> usuarios e conecte-se a um lugar onde você
                        <strong>descobre, curte e
                            se conecta</strong> com conteúdos incríveis, sem esforço.
                    </p>
                    <p>
                        Aqui, você não é só mais um ouvinte. Você é parte de uma comunidade que descobre os melhores
                        podcasts, dos criadores mais
                        autênticos, <strong>antes de todo mundo</strong>.
                    </p>
                </div>
                <div class="hero-actions">
                    <a href="#comunidade" class="btn btn-primary">Juntar-se à comunidade</a>
                    <a href="#descubra" class="btn btn-secondary">Explorar podcasts</a>
                </div>
            </div>
            <div class="hero-visual"></div>
        </section>
        <!-- recursos -->
        <section id="recursos" class="features">
            <div id="session-header" class="section-header">
                <h2 id="features-title" class="section-title">Por que escolher o <i
                        class="fi fi-sr-microphone footer-logo-icon"></i>PodCast+ ?</h1>
                    <p class="section-subtitle">Descubra todas as vantagens de fazer parte da nossa comunidade</p>
            </div>
            <div class="features-grid">
                <article class="feature-card">
                    <div class="feature-icon">
                        <i class="fi fi-sr-headphones"></i>
                    </div>
                    <h3 class="feature-title">Comunidade Ativa</h3>
                    <p class="feature-description">Participe de discussões e grupos com pessoas que compartilham seus
                        interesses.</p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">
                        <i class="fi fi-sr-star"></i>
                    </div>
                    <h3 class="feature-title">Recomendações Personalizadas</h3>
                    <p class="feature-description">Descubra novos podcasts baseado em seus gostos e histórico.</p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">
                        <i class="fi fi-sr-devices"></i>
                    </div>
                    <h3 class="feature-title">Multiplataforma</h3>
                    <p class="feature-description">Ouça seus podcasts favoritos em qualquer dispositivo, a qualquer
                        hora.</p>
                </article>
            </div>
        </section>
        <!-- descubra -->
        <section id="destaques" class="feature-podcasts">
            <div class="section-header">
                <h2 id="podcasts-title" class="section-title">Podcasts em Destaque</h2>
                <p class="section-subtitle">Conheça alguns dos podcasts que estão fazendo sucesso na nossa comunidade
                </p>
            </div>
            <div class="podcasts-grid">
                <?php while($row = $resultado->fetch_assoc()): ?>
                <article class="podcast-card">
                    <div class="podcast-header">
                        <img src=<?= $row['imagem']?>
                            class="podcast-image">
                        <span class="podcast-category category-tech"><?= $row['categoria']?></span>
                        <span class="podcast-badge badge-trending">Em Alta</span>
                    </div>
                    <div class="podcast-content">
                        <h3 class="podcast-title"><?= $row['titulo']?></h3>
                        <p class="podcast-host">
                            <i class="fi fi-sr-user"></i>
                            Por <?= $row['autor']?>
                        </p>
                        <p class="podcast-description">
                            <?= $row['descricao']?>
                        </p>
                        <div class="podcast-stats">
                            <div class="stat">
                                <i class="fi fi-sr-play"></i>
                                <span><?php
                                    if ($row['plays'] < 1000) {
                                        echo $row['plays'] . ' plays';
                                    } elseif ($row['plays'] < 1000000) {
                                        echo number_format($row['plays'] / 1000, 1) . 'K plays';
                                    } else {
                                        echo number_format($row['plays'] / 1000000, 1) . 'M plays';
                                    }
                                ?></span>
                            </div>
                            <div class="stat">
                                <i class="fi fi-sr-clock"></i>
                                <span><?= $row['duracao']?> min</span>
                            </div>
                            <div class="stat">
                                <i class="fi fi-sr-star"></i>
                                <span><?= $row['avaliacao']?></span>
                            </div>
                        </div>
                        <div class="podcast-actions">
                            <a href="./views/player.php?id=<?= $row['id']?>" class="btn btn-secondary">
                                <i class="fi fi-sr-play"></i>
                                Ouvir Agora
                            </a>
                            <a class="btn btn-secondary">
                                <i class="fi fi-sr-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>
            <div class="section-actions">
                <a href="./views/podcasts.php" class="btn btn-secondary">Ver todos os podcasts</a>
            </div>

        </section>

        <!-- comunidade -->
        <section id="comunidade" class="community">
            <div class="community-content">
                <h2 class="section-title">Junte-se à Nossa Comunidade</h2>
                <p class="community-text">
                    Conecte-se com outros ouvintes, compartilhe descobertas e participe de discussões sobre seus
                    podcasts favoritos.
                </p>
                <div class="community-stats">
                    <div class="stat">
                        <span class="stat-number">100k+</span>
                        <span class="stat-label">Ouvintes</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">5k+</span>
                        <span class="stat-label">Podcasts</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Categorias</span>
                    </div>
                </div>
                <a href="./views/register.php" class="btn btn-primary">Criar minha conta</a>
            </div>
            <div class="community-visual"></div>
        </section>

    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <div class="footer-logo">
                    <div class="logo-card">
                        <i class="fi fi-sr-microphone footer-logo-icon"></i>
                        <h1 class="footer-logo-text">PodCast+</h1>
                    </div>
                    <p class="footer-description">
                        Conectando você aos melhores podcasts e a uma comunidade de ouvintes apaixonados.
                    </p>
                </div>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Legal</h3>
                <ul class="footer-links">
                    <li><a href="#">Política de Privacidade</a></li>
                    <li><a href="#">Termos de Uso</a></li>
                    <li><a href="#">Política de Cookies</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Contato</h3>
                <ul class="footer-links">
                    <li><a href="mailto:contato@podcastmais.com">contato@podcastplus.com</a></li>
                    <li><a href="#">Suporte</a></li>
                    <li><a href="#">Sugestões</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 PodCast+. Todos os direitos reservados.</p>
            <p>
                Feito por Eduardo Ribeiro 🦝 e Italo Sampaio 🐈‍⬛ |
                Uicons do <a href="https://www.flaticon.com/uicons" target="_blank" rel="noopener">Flaticon</a>
            </p>
        </div>
    </footer>
</body>

</html>