<?php

declare(strict_types=1);

/**
 * @copyright  2020 Ad Aures
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html AGPL3
 * @link       https://castopod.org/
 */

return [
    'season' => 'Sezon {seasonNumber}',
    'season_abbr' => 'S{seasonNumber}',
    'number' => 'Odcinek {episodeNumber}',
    'number_abbr' => 'Odc. {episodeNumber}',
    'season_episode' => 'Sezon {seasonNumber} odcinek {episodeNumber}',
    'season_episode_abbr' => 'S{seasonNumber}O{episodeNumber}',
    'number_of_comments' => '{numberOfComments, plural,
        one {# komentarz}
        few {# komentarze}
        other {# komentarzy}
    }',
    'all_podcast_episodes' => 'Wszystkie odcinki podcastu',
    'back_to_podcast' => 'Wróć do podkastu',
    'edit' => 'Edytuj',
    'publish' => 'Publikuj',
    'publish_edit' => 'Edytuj publikację',
    'unpublish' => 'Cofnij publikację',
    'publish_error' => 'Odcinek jest już opublikowany.',
    'publish_edit_error' => 'Odcinek jest już opublikowany.',
    'publish_cancel_error' => 'Odcinek jest już opublikowany.',
    'unpublish_error' => 'Odcinek nie jest opublikowany.',
    'delete' => 'Usuń',
    'go_to_page' => 'Przejdź do strony',
    'create' => 'Dodaj odcinek',
    'publication_status' => [
        'published' => 'Opublikowany',
        'scheduled' => 'Zaplanowany',
        'not_published' => 'Nieopublikowany',
    ],
    'list' => [
        'episode' => 'Odcinek',
        'visibility' => 'Widoczność',
        'comments' => 'Komentarze',
        'actions' => 'Działania',
    ],
    'messages' => [
        'createSuccess' => 'Odcinek został pomyślnie utworzony!',
        'editSuccess' => 'Odcinek został pomyślnie zaktualizowany!',
        'publishCancelSuccess' => 'Episode publication successfully cancelled!',
    ],
    'form' => [
        'file_size_error' =>
            'Rozmiar Twojego pliku jest za duży! Maksymalny rozmiar to {0}. Zwiększ wartości `memory_limit`, `upload_max_filesize` i `post_max_size` w pliku konfiguracyjnym php, a następnie uruchom ponownie serwer www, aby przesłać plik.',
        'audio_file' => 'Plik audio',
        'audio_file_hint' => 'Wybierz plik audio w formacie .mp3 lub .m4a.',
        'info_section_title' => 'Informacje o odcinku',
        'cover' => 'Okładka odcinka',
        'cover_hint' =>
            'Jeśli nie ustawisz okładki, zamiast niej zostanie użyta okładka podcastu.',
        'cover_size_hint' => 'Okładka musi być kwadratowa o szerokości i wysokości co najmniej 1400 pikseli.',
        'title' => 'Tytuł',
        'title_hint' =>
            'Powinien zawierać jasną i zwięzłą nazwę odcinka. Nie podawaj tutaj numerów odcinków ani sezonów.',
        'permalink' => 'Odnośnik bezpośredni',
        'season_number' => 'Sezon',
        'episode_number' => 'Odcinek',
        'type' => [
            'label' => 'Typ',
            'full' => 'Pełny',
            'full_hint' => 'Pełna zawartość (odcinek)',
            'trailer' => 'Zwiastun',
            'trailer_hint' => 'Krótka, promocyjna treść przedstawiająca podgląd bieżącego programu',
            'bonus' => 'Bonus',
            'bonus_hint' => 'Dodatkowa treść do programu (np. informacje zza kulis lub wywiady z obsadą) albo treści promujące inne programy',
        ],
        'parental_advisory' => [
            'label' => 'Kontrola rodzicielska',
            'hint' => 'Czy odcinek zawiera treści dla dorosłych?',
            'undefined' => 'nieokreślona',
            'clean' => 'Czysta',
            'explicit' => 'Dla dorosłych',
        ],
        'show_notes_section_title' => 'Notatki programu',
        'show_notes_section_subtitle' =>
            'Do 4000 znaków, bądź jasny i zwięźly. Notatki programu pomagają potencjalnym słuchaczom w znalezieniu odcinka.',
        'description' => 'Opis',
        'description_footer' => 'Stopka opisu',
        'description_footer_hint' =>
            'Ten tekst jest dodawany na końcu każdego opisu odcinka; jest to dobre miejsce do wpisania np. linków społecznościowych.',
        'additional_files_section_title' => 'Dodatkowe pliki',
        'additional_files_section_subtitle' =>
            'Pliki te mogą być używane przez inne platformy, aby zapewnić lepsze wrażenia odbiorcom.<br />Więcej informacji znajdziesz w {podcastNamespaceLink}.',
        'location_section_title' => 'Lokalizacja',
        'location_section_subtitle' => 'O jakim miejscu jest ten odcinek?',
        'location_name' => 'Nazwa lub adres lokalizacji',
        'location_name_hint' => 'Może to być prawdziwa lub fikcyjna lokalizacja',
        'transcript' => 'Transkrypcja (napisy / podpisy kodowane)',
        'transcript_hint' => 'Dozwolone tylko .srt.',
        'transcript_download' => 'Pobierz transkrypcję',
        'transcript_file' => 'Plik transkrypcji (.srt)',
        'transcript_remote_url' => 'Zdalny adres URL dla transkrypcji',
        'transcript_file_delete' => 'Usuń plik transkrypcji',
        'chapters' => 'Rozdziały',
        'chapters_hint' => 'Plik musi być w formacie JSON Chapters.',
        'chapters_download' => 'Pobierz rozdziały',
        'chapters_file' => 'Plik rozdziałów',
        'chapters_remote_url' => 'Zdalny adres URL dla pliku rozdziałów',
        'chapters_file_delete' => 'Usuń plik rozdziałów',
        'advanced_section_title' => 'Parametry Zaawansowane',
        'advanced_section_subtitle' =>
            'Jeśli potrzebujesz tagów RSS, których Castopod nie obsługuje, ustaw je tutaj.',
        'custom_rss' => 'Własne tagi RSS dla odcinka',
        'custom_rss_hint' => 'Zostaną wstawione w tagu ❬item❭.',
        'block' => 'Odcinek powinien być ukryty na wszystkich platformach',
        'block_hint' =>
            'Pokaż lub ukryj post odcinka. Jeśli chcesz, aby ten odcinek został usunięty z katalogu Apple, włącz to.',
        'submit_create' => 'Stwórz odcinek',
        'submit_edit' => 'Zapisz odcinek',
    ],
    'publish_form' => [
        'back_to_episode_dashboard' => 'Wróć do pulpitu odcinka',
        'post' => 'Twój wpis ogłoszeniowy',
        'post_hint' =>
            "Napisz wiadomość, aby ogłosić publikację swojego odcinka. Wiadomość zostanie wyemitowana do wszystkich Twoich obserwujących w fediverse i pojawi się na stronie głównej Twojego podcastu.",
        'message_placeholder' => 'Napisz swoją wiadomość…',
        'publication_date' => 'Data publikacji',
        'publication_method' => [
            'now' => 'Teraz',
            'schedule' => 'Zaplanuj',
        ],
        'scheduled_publication_date' => 'Planowana data publikacji',
        'scheduled_publication_date_clear' => 'Wyczyść datę publikacji',
        'scheduled_publication_date_hint' =>
            'Możesz zaplanować wydanie odcinka ustawiając przyszłą datę publikacji. To pole musi być sformatowane jako YYYY-MM-DD HH:mm',
        'submit' => 'Opublikuj',
        'submit_edit' => 'Edytuj publikację',
        'cancel_publication' => 'Anuluj publikację',
        'message_warning' => 'Nie napisałeś wiadomości do swojego wpisu ogłoszeniowego!',
        'message_warning_hint' => 'Posiadanie wiadomości zwiększa zaangażowanie społeczne, co skutkuje lepszą widocznością Twojego odcinka.',
        'message_warning_submit' => 'Opublikuj mimo to',
    ],
    'unpublish_form' => [
        'disclaimer' =>
            "Cofnięcie publikacji odcinka spowoduje usunięcie wszystkich powiązanych z nim wpisów i usunięcie go z kanału RSS podcastu.",
        'understand' => 'Rozumiem, chcę cofnąć publikację odcinka',
        'submit' => 'Cofnij publikację',
    ],
    'delete_form' => [
        'disclaimer' =>
            "Usunięcie odcinka spowoduje usunięcie wszystkich powiązanych z nim wpisów i usunięcie go z kanału RSS podcastu.",
        'understand' => 'Rozumiem, chcę usunąć odcinek',
        'submit' => 'Usuń',
    ],
    'embed' => [
        'title' => 'Odtwarzacz osadzalny',
        'label' =>
            'Wybierz kolor motywu, skopiuj osadzalny odtwarzacz do schowka, a następnie wklej go na swojej stronie internetowej.',
        'clipboard_iframe' => 'Skopiuj odtwarzacz osadzalny do schowka',
        'clipboard_url' => 'Skopiuj adres do schowka',
        'dark' => 'Ciemny',
        'dark-transparent' => 'Ciemny przezroczysty',
        'light' => 'Jasny',
        'light-transparent' => 'Jasny przezroczysty',
    ],
];