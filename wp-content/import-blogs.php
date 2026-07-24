<?php
/**
 * Import 10 SEO blog posts for Home Renovation AE
 * Run: wp eval-file wp-content/import-blogs.php
 */

$content_dir = WP_CONTENT_DIR . '/blog-content';
$manifest = json_decode(file_get_contents($content_dir . '/manifest.json'), true);

if (!$manifest) {
    WP_CLI::error('Could not read manifest.json');
}

foreach ($manifest as $item) {
    $file = $content_dir . '/' . $item['file'];
    if (!file_exists($file)) {
        WP_CLI::warning('Missing: ' . $item['file']);
        continue;
    }

    $content = file_get_contents($file);

    $existing = get_page_by_path($item['slug'], OBJECT, 'post');
    if ($existing) {
        WP_CLI::log('Skip (exists): ' . $item['title']);
        continue;
    }

    $post_id = wp_insert_post([
        'post_title'   => $item['title'],
        'post_name'    => $item['slug'],
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'post',
        'post_author'  => 1,
        'post_excerpt' => $item['excerpt'],
    ], true);

    if (is_wp_error($post_id)) {
        WP_CLI::warning($item['title'] . ': ' . $post_id->get_error_message());
        continue;
    }

    wp_set_post_categories($post_id, array_map('intval', $item['categories']));

    update_post_meta($post_id, '_yoast_wpseo_metadesc', $item['meta']);
    update_post_meta($post_id, '_yoast_wpseo_focuskw', $item['focus']);
    update_post_meta($post_id, 'rank_math_description', $item['meta']);
    update_post_meta($post_id, 'rank_math_focus_keyword', $item['focus']);

    WP_CLI::success('Created #' . $post_id . ': ' . $item['title']);
}

WP_CLI::log('Done.');
