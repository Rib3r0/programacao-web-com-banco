document.addEventListener('DOMContentLoaded', function() {
    // Elementos do DOM
    const audio = document.getElementById('podcastAudio');
    const playBtn = document.querySelector('.play-btn');
    const playIcon = playBtn.querySelector('i');
    const progress = document.querySelector('.progress');
    const progressBar = document.querySelector('.progress-bar');
    const currentTimeEl = document.querySelector('.current-time');
    const durationEl = document.querySelector('.duration');
    const volumeSlider = document.querySelector('.volume-slider');
    const volumeIcon = document.querySelector('.fi-sr-volume');
    const skipBackwardBtn = document.querySelector('.control-btn:nth-child(1)');
    const skipForwardBtn = document.querySelector('.control-btn:nth-child(3)');

    // Estado do player
    let isPlaying = false;

    // Formatar tempo em MM:SS
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }

    // Atualizar tempo de duração quando metadata carregar
    audio.addEventListener('loadedmetadata', function() {
        durationEl.textContent = formatTime(audio.duration);
    });

    // Controle Play/Pause
    playBtn.addEventListener('click', function() {
        if (audio.paused) {
            audio.play();
            isPlaying = true;
            playIcon.classList.remove('fi-sr-play');
            playIcon.classList.add('fi-sr-pause');
        } else {
            audio.pause();
            isPlaying = false;
            playIcon.classList.remove('fi-sr-pause');
            playIcon.classList.add('fi-sr-play');
        }
    });

    // Atualizar barra de progresso
    audio.addEventListener('timeupdate', function() {
        const progressPercent = (audio.currentTime / audio.duration) * 100;
        progress.style.width = progressPercent + '%';
        currentTimeEl.textContent = formatTime(audio.currentTime);
    });

    // Clique na barra de progresso para buscar
    progressBar.addEventListener('click', function(e) {
        const rect = progressBar.getBoundingClientRect();
        const percent = (e.clientX - rect.left) / rect.width;
        audio.currentTime = percent * audio.duration;
    });

    // Controle de volume
    volumeSlider.addEventListener('input', function() {
        const volume = this.value / 100;
        audio.volume = volume;
        
        if (volume === 0) {
            volumeIcon.classList.remove('fi-sr-volume');
            volumeIcon.classList.add('fi-sr-volume-mute');
        } else {
            volumeIcon.classList.remove('fi-sr-volume-mute');
            volumeIcon.classList.add('fi-sr-volume');
        }
    });

    // Pular 15 segundos para trás
    skipBackwardBtn.addEventListener('click', function() {
        audio.currentTime = Math.max(0, audio.currentTime - 15);
    });

    // Pular 30 segundos para frente
    skipForwardBtn.addEventListener('click', function() {
        audio.currentTime = Math.min(audio.duration, audio.currentTime + 30);
    });

    // Quando áudio terminar
    audio.addEventListener('ended', function() {
        isPlaying = false;
        playIcon.classList.remove('fi-sr-pause');
        playIcon.classList.add('fi-sr-play');
        progress.style.width = '0%';
        currentTimeEl.textContent = '0:00';
    });

    // Controles de teclado
    document.addEventListener('keydown', function(e) {
        switch(e.code) {
            case 'Space':
                e.preventDefault();
                playBtn.click();
                break;
            case 'ArrowLeft':
                e.preventDefault();
                skipBackwardBtn.click();
                break;
            case 'ArrowRight':
                e.preventDefault();
                skipForwardBtn.click();
                break;
            case 'ArrowUp':
                e.preventDefault();
                volumeSlider.value = Math.min(100, parseInt(volumeSlider.value) + 10);
                volumeSlider.dispatchEvent(new Event('input'));
                break;
            case 'ArrowDown':
                e.preventDefault();
                volumeSlider.value = Math.max(0, parseInt(volumeSlider.value) - 10);
                volumeSlider.dispatchEvent(new Event('input'));
                break;
        }
    });

    // Inicializar volume
    audio.volume = volumeSlider.value / 100;
});