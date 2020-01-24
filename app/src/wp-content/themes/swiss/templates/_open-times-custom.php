<?php
    if( get_field('opt_opening_times_link', 'option') ): ?>
        <div class="b-site-header__opening-times-wrapper">
            <div class="b-site-header__opening-times-wrapper__clock">
                <i class="c-icon c-icon__custom" style="background-image: url(<?php echo get_field('opt_opening_times_icon', 'option')['sizes']['medium']?>)"></i>
            </div>
            <div class="b-site-header__opening-times-wrapper__content">
                <div class="b-site-header__opening-times-wrapper__content__time">
                    <a href="<?php echo get_field('opt_opening_times_custom_bold', 'option')['url']; ?>"><?php echo get_field('opt_opening_times_custom_bold', 'option')['title'];?> <i class="fa fa-chevron-right"></i></a>
                </div>
                <?php if( get_field('opt_opening_times_link', 'option') ){ ?>
                    <div class="b-site-header__opening-times-wrapper__content__link">
                        <a href="<?php echo get_field('opt_opening_times_custom_text', 'option')['url']; ?>"><?php echo get_field('opt_opening_times_custom_text', 'option')['title'];?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php endif;
?>