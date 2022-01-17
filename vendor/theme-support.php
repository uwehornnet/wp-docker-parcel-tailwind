<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

add_theme_support( 'post-thumbnails' );

add_image_size('small', 300, 300);
add_image_size('medium', 400, 400);
add_image_size('large', 800, 800);

register_nav_menus(array(
    'primary' => esc_html__('Primary', 'template'),
    'secondary' => esc_html__('Secondary', 'template'),
    'footer' => esc_html__('Footer', 'template'),
));


// enable threaded comments
function enable_threaded_comments()
{
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
	}
}

add_action('get_header', 'enable_threaded_comments');


// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


// custom excerpt ellipses for 2.8-
function custom_excerpt_more($excerpt)
{
	return str_replace('[...]', '...', $excerpt);
}

add_filter('wp_trim_excerpt', 'custom_excerpt_more');


// no more jumping for read more link
function no_more_jumping($post)
{
	return '<a href="' . get_permalink($post->ID) . '" class="read-more">' . 'Continue Reading' . '</a>';
}

add_filter('excerpt_more', 'no_more_jumping');


// jquery deactivation
if (!is_admin()) {
	//p_deregister_script('jquery');
}
