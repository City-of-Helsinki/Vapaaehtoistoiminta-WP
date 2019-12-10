<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Evermade\Swiss\Block(array('hide', 'color', 'section_header', 'posts'));

if(empty($block->get('posts'))){

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 20
    );

    // if(!empty($block->get('layout'))) {
    //     $args['posts_per_page'] = 3;
    // }

    $custom_query = new \WP_Query($args);

    $block->set('posts', $custom_query->posts, 'fields');

}

if(!$block->get('hide')) {

include(__DIR__.'/templates/view.php');

}
