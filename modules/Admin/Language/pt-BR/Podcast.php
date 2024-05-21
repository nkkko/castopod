<?php

declare(strict_types=1);

/**
 * @copyright  2020 Ad Aures
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html AGPL3
 * @link       https://castopod.org/
 */

return [
    'all_podcasts' => 'Todos os podcasts',
    'no_podcast' => 'Nenhum podcast encontrado!',
    'create' => 'Criar podcast',
    'import' => 'Importar podcast',
    'all_imports' => 'Podcast imports',
    'new_episode' => 'Novo Episódio',
    'view' => 'Ver podcast',
    'edit' => 'Editar podcast',
    'publish' => 'Publicar podcast',
    'publish_edit' => 'Editar publicação',
    'delete' => 'Excluir podcast',
    'see_episodes' => 'Ver episódios',
    'see_contributors' => 'Ver contribuidores',
    'monetization_other' => 'Other monetization',
    'go_to_page' => 'Ir para a página',
    'latest_episodes' => 'Últimos episódios',
    'see_all_episodes' => 'Ver todos os episódios',
    'draft' => 'Rascunho',
    'messages' => [
        'createSuccess' => 'Podcast criado com sucesso!',
        'editSuccess' => 'Podcast foi atualizado com sucesso!',
        'importSuccess' => 'Podcast foi importado com sucesso!',
        'deleteSuccess' => 'Podcast @{podcast_handle} excluído com sucesso!',
        'deletePodcastMediaError' => 'Falha ao excluir {type, select,
            cover {a capa}
            banner {o banner}
            other {a mídia}
        } do podcast.',
        'deleteEpisodeMediaError' => 'Falha ao excluir {type, select,
            transcript {a transcrição}
            chapters {os capítulos}
            image {a capa}
            audio {o áudio}
            other {a mídia}
        } do episódio de podcast {episode_slug}.',
        'deletePodcastMediaFolderError' => 'Falha ao excluir a pasta de mídia de podcast {folder_path}. Você pode removê-la manualmente de seu disco.',
        'podcastFeedUpdateSuccess' => 'Atualização bem sucedida: {number_of_new_episodes, plural,
            one {# episódio foi adicionado}
            other {# episódios foram adicionados}
        } ao podcast!',
        'podcastFeedUpToDate' => 'O Podcast já está atualizado.',
        'publishError' => 'Este podcast já está publicado ou agendado para publicação.',
        'publishEditError' => 'Este podcast não está agendado para publicação.',
        'publishCancelSuccess' => 'Publicação do Podcast cancelada com sucesso!',
        'scheduleDateError' => 'Data de agendamento deve ser definida!',
    ],
    'form' => [
        'identity_section_title' => 'Identidade do podcast',
        'identity_section_subtitle' => 'Esses campos permitem que você seja notado.',
        'fediverse_section_title' => 'Fediverse identity',

        'cover' => 'Capa do podcast',
        'cover_size_hint' => 'A capa deve ser quadrada e ter pelo menos 1400px de largura e altura.',
        'banner' => 'Banner do podcast',
        'banner_size_hint' => 'Banner deve ter uma proporção 3:1 e ter ao menos 1500px de largura.',
        'banner_delete' => 'Excluir banner do podcast',
        'title' => 'Título',
        'handle' => 'Identificador',
        'handle_hint' =>
            'Usado para identificar o podcast. Maiúsculas, minúsculas, números e underscores (_) são aceitos.',
        'type' => [
            'label' => 'Tipo',
            'episodic' => 'Episódico',
            'episodic_hint' => 'Se os episódios são destinados a serem consumidos sem qualquer ordem específica. Os episódios mais recentes serão apresentados primeiro.',
            'serial' => 'Serial',
            'serial_hint' => 'Se a intenção é que os episódios sejam consumidos em uma ordem sequencial. Episódios vão ser apresentados em uma ordem numérica.',
        ],
        'medium' => [
            'label' => 'Medium',
            'hint' => 'Medium as represented by podcast:medium tag in RSS. Changing this may change how players present your feed.',
            'podcast' => 'Podcast',
            'podcast_hint' => 'Describes a feed for a podcast show.',
            'music' => 'Music',
            'music_hint' => 'A feed of music organized into an "album" with each item a song within the album.',
            'audiobook' => 'Audiobook',
            'audiobook_hint' => 'Specific types of audio with one item per feed, or where items represent chapters within the book.',
        ],
        'description' => 'Descrição',
        'classification_section_title' => 'Classificação',
        'classification_section_subtitle' =>
            'Esses campos terão impacto no seu público e na concorrência.',
        'language' => 'Idioma',
        'category' => 'Categoria',
        'category_placeholder' => 'Selecione uma categoria…',
        'other_categories' => 'Outras categorias',
        'parental_advisory' => [
            'label' => 'Aviso aos pais',
            'hint' => 'Contém conteúdo explícito?',
            'undefined' => 'não definido',
            'clean' => 'Limpo',
            'explicit' => 'Explícito',
        ],
        'author_section_title' => 'Autor',
        'author_section_subtitle' => 'Quem está gerenciando o podcast?',
        'owner_name' => 'Nome do proprietário',
        'owner_name_hint' =>
            'Apenas para uso administrativo. Visível no feed RSS público.',
        'owner_email' => 'E-mail do proprietário',
        'owner_email_hint' =>
            'Será utilizado pela maioria das plataformas para verificar a propriedade do podcast. Visível no feed RSS público.',
        'is_owner_email_removed_from_feed' => 'Remove the owner email from the public RSS feed',
        'is_owner_email_removed_from_feed_hint' => 'You may need to temporarily unhide the email so that a directory can verify your podcast ownership.',
        'publisher' => 'Editora',
        'publisher_hint' =>
            'O grupo responsável pela criação do podcast. Muitas vezes se refere à empresa-mãe ou rede de um podcast. Este campo é por vezes rotulado como "Autor".',
        'copyright' => 'Direitos autorais',
        'location_section_title' => 'Localização',
        'location_section_subtitle' => 'Sobre que lugar é esse podcast?',
        'location_name' => 'Nome ou endereço da localização',
        'location_name_hint' => 'Este pode ser um lugar real ou fictício',
        'monetization_section_title' => 'Monetização',
        'monetization_section_subtitle' =>
            'Ganhe dinheiro graças à sua audiência.',
        'premium' => 'Premium',
        'premium_by_default' => 'Episódios devem ser definidos como premium por padrão',
        'premium_by_default_hint' => 'Podcast episodes will be marked as premium by default. You can still choose to set some episodes, trailers or bonuses as public.',
        'op3' => 'Open Podcast Prefix Project (OP3)',
        'op3_link' => 'Visit your OP3 dashboard (external link)',
        'op3_hint' => 'Value your analytics data with OP3, an open-source and trusted third party analytics service. Share, validate and compare your analytics data with the open podcasting ecosystem.',
        'op3_enable' => 'Ativar serviço de análise OP3',
        'op3_enable_hint' => 'Por razões de segurança, os dados de análise dos episódios premium não serão compartilhados com o OP3.',
        'payment_pointer' => 'Endereço de pagamento (Payment Pointer) para web monetização',
        'payment_pointer_hint' =>
            'Este é o seu lugar onde você receberá dinheiro graças à web monetização',
        'advanced_section_title' => 'Parâmetros Avançados',
        'advanced_section_subtitle' =>
            'Se você precisa de tags RSS que Castopod não lida, defina-as aqui.',
        'custom_rss' => 'Tags RSS personalizadas para o podcast',
        'custom_rss_hint' => 'Isto será injetado dentro da tag ❬channel❭.',
        'verify_txt' => 'Ownership verification TXT',
        'verify_txt_hint' => 'Rather than relying on email, certain third-party services may confirm your podcast ownership by requesting you to embed a verification text within your feed.',
        'verify_txt_helper' => 'This text is injected into a <podcast:txt purpose="verify"> tag.',
        'new_feed_url' => 'Nova URL de feed',
        'new_feed_url_hint' => 'Use este campo ao mover este podcast para outro domínio ou alterar hosts. Por padrão, este campo é preenchido com a URL do feed RSS atual se o podcast for importado.',
        'old_feed_url' => 'URL de feed antigo',
        'partnership' => 'Parceria',
        'partner_id' => 'ID',
        'partner_link_url' => 'URL do link',
        'partner_image_url' => 'URL da imagem',
        'partner_id_hint' => 'Seu próprio ID de parceiro',
        'partner_link_url_hint' => 'O endereço genérico de link do parceiro',
        'partner_image_url_hint' => 'O endereço genérico da imagem de parceiro',
        'block' => 'O podcast deve ser ocultado dos catálogos públicos',
        'block_hint' =>
            'O status do podcast: ativar isso impede que o podcast inteiro apareça em Apple Podcasts, Google Podcasts e qualquer aplicativo de terceiros que extraia programas desses diretórios. (Não garantido)',
        'complete' => 'Podcast não terá novos episódios',
        'lock' => 'Impedir que o podcast seja copiado',
        'lock_hint' =>
            'O objetivo é dizer a outras plataformas de podcast se elas têm permissão para importar este feed. Um valor de "sim" significa que qualquer tentativa de importar esse feed para uma nova plataforma deve ser rejeitada.',
        'submit_create' => 'Criar podcast',
        'submit_edit' => 'Salvar podcast',
    ],
    'category_options' => [
        'uncategorized' => 'sem categoria',
        'arts' => 'Artes',
        'business' => 'Negócios',
        'comedy' => 'Comédia',
        'education' => 'Educação',
        'fiction' => 'Ficção',
        'government' => 'Governo',
        'health_and_fitness' => 'Saúde &amp Fitness',
        'history' => 'História',
        'kids_and_family' => 'Crianças &amp Família',
        'leisure' => 'Lazer',
        'music' => 'Música',
        'news' => 'Notícias',
        'religion_and_spirituality' => 'Religião e Espiritualidade',
        'science' => 'Ciência',
        'society_and_culture' => 'Sociedade e Cultura',
        'sports' => 'Esportes',
        'technology' => 'Tecnologia',
        'true_crime' => 'Crimes Verídicos',
        'tv_and_film' => 'TV &amp Filme',
        'books' => 'Livros',
        'design' => 'Design',
        'fashion_and_beauty' => 'Moda &amp Beleza',
        'food' => 'Culinária',
        'performing_arts' => 'Artes Cênicas',
        'visual_arts' => 'Artes Visuais',
        'careers' => 'Carreira',
        'entrepreneurship' => 'Empreendedorismo',
        'investing' => 'Investimento',
        'management' => 'Administração',
        'marketing' => 'Marketing',
        'non_profit' => 'Sem fins lucrativos',
        'comedy_interviews' => 'Entrevistas Cômicas',
        'improv' => 'Improvisação',
        'stand_up' => 'Stand-Up',
        'courses' => 'Cursos',
        'how_to' => 'Como fazer',
        'language_learning' => 'Aprendizagem de idiomas',
        'self_improvement' => 'Autoajuda',
        'comedy_fiction' => 'Ficção Cômica',
        'drama' => 'Drama',
        'science_fiction' => 'Ficção Científica',
        'alternative_health' => 'Saúde Alternativa',
        'fitness' => 'Fitness',
        'medicine' => 'Medicina',
        'mental_health' => 'Saúde Mental',
        'nutrition' => 'Nutrição',
        'sexuality' => 'Sexualidade',
        'education_for_kids' => 'Educação para Crianças',
        'parenting' => 'Maternidade/paternidade',
        'pets_and_animals' => 'Animais de estimação &amp Outros animais',
        'stories_for_kids' => 'Histórias para crianças',
        'animation_and_manga' => 'Animação &amp Mangá',
        'automotive' => 'Automotivo',
        'aviation' => 'Aviação',
        'crafts' => 'Artesanato',
        'games' => 'Jogos',
        'hobbies' => 'Hobbies',
        'home_and_garden' => 'Casa &amp Jardim',
        'video_games' => 'Vídeo Games',
        'music_commentary' => 'Comentários sobre música',
        'music_history' => 'História da música',
        'music_interviews' => 'Entrevistas de Música',
        'business_news' => 'Notícias de Negócios',
        'daily_news' => 'Notícias Diárias',
        'entertainment_news' => 'Notícias de entretenimento',
        'news_commentary' => 'Comentários de Notícias',
        'politics' => 'Política',
        'sports_news' => 'Notícias Esportivas',
        'tech_news' => 'Notícias de Tecnologia',
        'buddhism' => 'Budismo',
        'christianity' => 'Cristianismo',
        'hinduism' => 'Hinduísmo',
        'islam' => 'Islã',
        'judaism' => 'Judaísmo',
        'religion' => 'Religião',
        'spirituality' => 'Espiritualidade',
        'astronomy' => 'Astronomia',
        'chemistry' => 'Química',
        'earth_sciences' => 'Ciências da Terra',
        'life_sciences' => 'Ciências da Vida',
        'mathematics' => 'Matemática',
        'natural_sciences' => 'Ciências Naturais',
        'nature' => 'Natureza',
        'physics' => 'Física',
        'social_sciences' => 'Ciências Sociais',
        'documentary' => 'Documentário',
        'personal_journals' => 'Diários',
        'philosophy' => 'Filosofia',
        'places_and_travel' => 'Lugares e Viagem',
        'relationships' => 'Relacionamentos',
        'baseball' => 'Beisebol',
        'basketball' => 'Basquete',
        'cricket' => 'Críquete',
        'fantasy_sports' => 'Esportes de Fantasia',
        'football' => 'Futebol Americano',
        'golf' => 'Golfe',
        'hockey' => 'Hóquei',
        'rugby' => 'Rúgbi',
        'running' => 'Corrida',
        'soccer' => 'Futebol',
        'swimming' => 'Natação',
        'tennis' => 'Tênis',
        'volleyball' => 'Voleibol',
        'wilderness' => 'Mundo Selvagem',
        'wrestling' => 'Luta Livre',
        'after_shows' => 'Nos Bastidores',
        'film_history' => 'História do Cinema',
        'film_interviews' => 'Entrevistas de Filmes',
        'film_reviews' => 'Avaliações de Filmes',
        'tv_reviews' => 'Avaliações de TV',
    ],
    'publish_form' => [
        'back_to_podcast_dashboard' => 'Voltar ao painel do podcast',
        'post' => 'Sua mensagem de publicação',
        'post_hint' =>
            "Escreva uma mensagem para anunciar a publicação do seu podcast. A mensagem será destacada na página inicial do seu podcast.",
        'message_placeholder' => 'Escreva a sua mensagem…',
        'submit' => 'Publicar',
        'publication_date' => 'Data de publicação',
        'publication_method' => [
            'now' => 'Agora',
            'schedule' => 'Programar',
        ],
        'scheduled_publication_date' => 'Data de publicação programada',
        'scheduled_publication_date_hint' =>
            'Você pode agendar a liberação do podcast definindo uma data de publicação futura. Este campo deve ser formatado como YYYY-MM-DD HH:mm',
        'submit_edit' => 'Editar publicação',
        'cancel_publication' => 'Cancelar publicação',
        'message_warning' => 'Você não escreveu uma mensagem para o anúncio do episódio!',
        'message_warning_hint' => 'Ter uma mensagem aumenta o engajamento social, resultando em uma melhor visibilidade do seu podcast.',
        'message_warning_submit' => 'Publicar mesmo assim',
    ],
    'publication_status_banner' => [
        'draft_mode' => 'modo rascunho',
        'not_published' => 'Este podcast ainda não foi publicado.',
        'scheduled' => 'Este podcast está programado para publicação em {publication_date}.',
    ],
    'delete_form' => [
        'disclaimer' =>
            "Excluir o podcast irá excluir todos os episódios, arquivos de mídia, publicações e estatísticas associados a ele. Essa ação é irreversível, você não será capaz de recuperá-la depois.",
        'understand' => 'Eu compreendo, quero que o podcast seja permanentemente excluído',
        'submit' => 'Excluir',
    ],
    'by' => 'Por {publisher}',
    'season' => 'Temporada {seasonNumber}',
    'list_of_episodes_year' => 'Episódios de {year} ({episodeCount})',
    'list_of_episodes_season' =>
        'Episódios da temporada {seasonNumber} ({episodeCount})',
    'no_episode' => 'Nenhum episódio encontrado!',
    'follow' => 'Seguir',
    'followers' => '{numberOfFollowers, plural,
        one {# seguidor}
        other {# seguidores}
    }',
    'posts' => '{numberOfPosts, plural,
        one {# publicação}
        other {# publicações}
    }',
    'activity' => 'Atividade',
    'episodes' => 'Episódios',
    'sponsor' => 'Apoiar',
    'funding_links' => 'Links de financiamento para {podcastTitle}',
    'find_on' => 'Encontrar {podcastTitle} em',
    'listen_on' => 'Ouvir em',
];
