<?php
include("..\\php\\connection.php");
$id = intval($_GET['id']);
$sql = "SELECT * FROM podcast WHERE id = $id";
$resultado = $conexao->query($sql);
$podcast = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvir Podcast | PodCast+</title>
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
            <a href="./podcasts.php" class="logo-card">
                <i class="fi fi-sr-microphone logo-icon"></i>
                <h1 class="logo-text">PodCast+</h1>
            </a>
            <a href="./podcasts.php" class="back-btn">
                <i class="fi fi-sr-arrow-small-left"></i>
                Voltar
            </a>
        </div>
    </header>
    <main class="player-container">
        <div class="player-card">
            <img src=<?= $podcast['imagem'] ?>
                alt="Capa do Podcast" class="podcast-cover">
            <div class="player-content">
                <h2 class="player-title"><?= $podcast['titulo'] ?></h2>
                <p class="podcast-host">Por <?= $podcast['autor'] ?></p>

                <div class="player-controls">
                    <audio id="podcastAudio">
                        <source src="<?= $podcast['audio'] ?>"
                            type="audio/mp3">
                        Seu navegador não suporta o elemento audio.
                    </audio>
                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>
                    <div class="time-info">
                        <span class="current-time">0:00</span>
                        <span class="duration">45:00</span>
                    </div>

                    <div class="control-buttons">
                        <button class="control-btn">
                            <i class="fi fi-sr-rewind"></i>
                        </button>
                        <button class="control-btn play-btn">
                            <i class="fi fi-sr-play"></i>
                        </button>
                        <button class="control-btn">
                            <i class="fi fi-sr-forward"></i>
                        </button>
                        <div class="volume-control">
                            <i class="fi fi-sr-volume"></i>
                            <input type="range" class="volume-slider" min="0" max="100" value="100">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="episode-info">
            <h3 class="episode-title"><?= $podcast['titulo']?></h3>
            <p class="episode-description">
                <?= $podcast['descricao']?>
            </p>
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