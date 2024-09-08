<?php
function song_similarity_enqueue_scripts() {
    wp_enqueue_style('song-similarity-style', get_stylesheet_uri());
    wp_enqueue_script('song-similarity-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);

    wp_localize_script('song-similarity-scripts', 'songSimilarity', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'song_similarity_enqueue_scripts');

function song_similarity_handle_ajax() {
    if (!isset($_POST['singer_name'], $_POST['professor_song_url'], $_POST['professor_song_lyrics'])) {
        wp_send_json_error('Invalid input');
        return;
    }

    $singer_name = sanitize_text_field($_POST['singer_name']);
    $professor_song_url = esc_url_raw($_POST['professor_song_url']);
    $professor_song_lyrics = sanitize_textarea_field($_POST['professor_song_lyrics']);

    // For demo purposes, we're returning static results.
    // Replace this with your API call or logic.
    $results = array(
        array('artist_song' => 'Example Song 1', 'professor_song' => 'Professor Song', 'similarity' => 0.85),
        array('artist_song' => 'Example Song 2', 'professor_song' => 'Professor Song', 'similarity' => 0.78),
        array('artist_song' => 'Example Song 3', 'professor_song' => 'Professor Song', 'similarity' => 0.90),
    );

    wp_send_json_success($results);
}
add_action('wp_ajax_song_similarity', 'song_similarity_handle_ajax');
add_action('wp_ajax_nopriv_song_similarity', 'song_similarity_handle_ajax');
