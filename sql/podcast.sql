CREATE TABLE podcast (
  id INT AUTO_INCREMENT PRIMARY KEY,
  categoria VARCHAR(100),
  titulo VARCHAR(255),
  descricao TEXT,
  autor VARCHAR(100),
  plays INT,
  duracao INT,
  avaliacao DECIMAL(2,1),
  disponivel BOOLEAN DEFAULT TRUE,
  audio VARCHAR(100),
  imagem VARCHAR(100),
  data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO podcast (
  categoria,
  titulo,
  descricao,
  autor,
  plays,
  duracao,
  avaliacao,
  audio,
  imagem
  ) VALUES (
    'MUSICA',
    'Tech Talks: O Futuro da IA',
    'Discussões profundas sobre inteligência artificial, machine learning e como essas tecnologias estão moldando nosso futuro. Episódio especial com CEOs do Vale do Silício.',
    'Carlos Silva',
    15000,
    45,
    4.8,
    '../audio/Kainbeats - mindscapes (Sad Lofi Hiphop EP) [iuT8KImN-Rk].mp3',
    'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80'
  ),
  (
  'CULTURA',
  'Conexões Culturais: Identidade e Globalização',
  'Uma análise profunda sobre como as identidades culturais se transformam no mundo globalizado. Discussões sobre preservação cultural, apropriação e trocas interculturais.',
  'Ana Rodrigues',
  8200,
  52,
  4.7,
  '../audio/cultura-identidade-globalizacao.mp3',
  'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
  ),
  (
  'CULTURA',
  'Expressões Urbanas: A Arte das Ruas',
  'Explorando o grafite, o hip-hop e outras manifestações artísticas que transformam o espaço urbano. Entrevistas com artistas e coletivos culturais.',
  'Rafael Costa',
  12500,
  48,
  4.9,
  '../audio/expressoes-urbanas-arte-ruas.mp3',
  'https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
)