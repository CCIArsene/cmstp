<?php
/*
Plugin Name: mostcommented
Description: Un plugin pour afficher le top commentaire
Version: 1.0
Author: Arsene
*/


function mostcommented($atts) {
    global $wpdb;

    $atts = shortcode_atts(
        array(
            'number' => '5',
        ),
        $atts,
        'mostcommented'
    );

    $number = intval($atts['number']);

    
    
    $query = "
        SELECT ID, post_title, comment_count 
        FROM wp_posts
        WHERE post_status = 'publish' AND post_type = 'post' 
        ORDER BY comment_count DESC 
        LIMIT %d
    ";
    $posts = $wpdb->get_results($wpdb->prepare($query, $number));

    if (empty($posts)) {
        return 'Aucun article trouvé.';
    }

    
    ob_start();
    ?>
    <table class="most-commented-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Nombre de Commentaires</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) : ?>
            <tr>
                <td><a href="<?php echo get_permalink($post->ID); ?>"><?php echo esc_html($post->post_title); ?></a></td>
                <td><?php echo intval($post->comment_count); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    return ob_get_clean();
}


add_shortcode('mostcommented', 'mostcommented');
