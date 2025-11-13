<?php
include("..\\php\\connection.php");
$sql = "SELECT * FROM podcast ";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Podcast | PodCast+</title>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="./style-views.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-container">
            <a href="#" class="logo-card">
                <i class="fi fi-sr-microphone logo-icon"></i>
                <h1 class="logo-text">PodCast+</h1>
            </a>
        </div>
    </header>
    <main class="podcasts-container">
        <h1 class="podcasts-titulo">Lista de Podcasts disponiveis</h1>
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
                        <a href="../views/player.php?id=<?= $row['id']?>" class="btn btn-secondary">
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