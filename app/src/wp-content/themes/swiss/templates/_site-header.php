<header class="b-site-header js-site-header">
    <div class="b-site-header__container">
        <a class="b-site-header__logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" style="background-image: url(<?php echo get_field('opt_logo_header', 'option')['sizes']['medium'];?>)"><?php bloginfo('name'); ?></a>

        <div class="b-site-header__slogan">
            <?php echo \Evermade\Swiss\template('_slogan.php'); ?>
        </div>

        <?php /* if ( !empty(get_field('opt_opening_times_link', 'option') ) ): ?>
              <div class="b-site-header__opening-times-wrapper" id="opening-times"></div>
        <?php endif; */?>

        <?php if (get_field('opt_opening_times_custom', 'option') !== true):
            echo \Evermade\Swiss\template('_open-times.php');
        else:
            echo \Evermade\Swiss\template('_open-times-custom.php');
        endif;
        ?>

        <div class="b-site-header__extras">
            <?php echo \Evermade\Swiss\wpmlLanguageSwitcher(); ?>
            <?php echo \Evermade\Swiss\template('_social-media.php', $app->get('opt_social_media')); ?>
        </div>
    </div>
</header>
