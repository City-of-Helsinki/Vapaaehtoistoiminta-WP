<section class="b-taglist">

    <div class="b-taglist__text">
        <?php if ($block->get('text')):?>
            <div class="h-wysiwyg-html"><?php echo $block->get('text');?></div>
        <?php endif;?>
    </div>

    <h4 class="b-taglist__mobile-filter-title js-show-tags-mobile"><?php _e('Filter', 'swiss');?></h4>
    <div class="b-taglist__container">
    <?php if ($block->get('tag_type')) : ?>
    <?php if ($block->get('tag_type') == 'ideas') {
        $tag_type = 'type';
    }
    else if ($block->get('tag_type') == 'places') {
        $tag_type = 'place_tag';
    }
    else if ($block->get('tag_type') == 'posts') {
        $tag_type = 'category';
    }
    ?>
    <?php
        $terms = get_terms( array(
            'taxonomy' => $tag_type
        ) ); ?>
        <?php foreach ( $terms as $term ) : ?>
        <a class="b-taglist__tag c-btn" href="<?php $link = get_term_link($term); echo esc_url($link); ?>"><?php echo $term->name; ?></a>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if($block->get('manual')) : ?>
        <?php foreach ( $block->get('manual') as $m => $v ) : ?>
        <a class="b-taglist__tag c-btn" href="<?php echo \Evermade\Swiss\getFrom('link', $v); ?>"><?php echo \Evermade\Swiss\getFrom('title', $v); ?></a>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
