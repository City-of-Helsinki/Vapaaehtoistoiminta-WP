<?php /* So this file is a real mess, sorry. Didn't have time to fix this properly. */ ?>

<section class="b-listing">

    <div class="b-listing__container">

        <?php include get_template_directory().'/templates/_section-header.php'; ?>

        <?php if(!empty($block->get('posts'))): $total = count($block->get('posts')); $i = 1; ?>
            <div class="c-card-carousel js-ideas-slider" data-card-color="<?php echo $block->get('color');?>">
                <?php global $post; foreach($block->get('posts') as $k => $post): setup_postdata($post); ?>

                    <?php
                        // Create layouts
                        if ($i == 1):
                            // 4 & 5 items use same layout
                            if ($total >= 4):
                                $x = 5;
                            elseif ($total == 3):
                                $x = 3;
                            elseif ($total == 2):
                                $x = 2;
                            endif;
                        endif;
                    ?>

                    <?php if ($i == 1): // Big box?>
                        <div class="c-card-carousel__slide" data-card-items="<?php echo $x;?>"><div class="c-card-slider">
                    <?php endif;?>

                    <?php if ($i == 2): // 2/3/4 box?>
                        <div class="c-card-slider__wrap">
                    <?php endif;?>

                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-card-slider__card">
                        <div class="c-card-slider__card__wrapper">
                            <div class="c-card-slider__image" style="background-image:url(<?php echo \Evermade\Swiss\featuredImageUrl('medium-large');?>">
                                <div class="c-card-slider__card__text">
                                    <span class="c-card-slider__card__headline"><?php the_title(); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php
                        if ($i == $x): // Reset layout?>
                            </div>
                        </div></div>
                    <?php endif;?>


                    <?php $i++; $total--; if ($i > $x) { $i = 1; } ?>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>

        <?php endif; ?>


    </div><!-- end of b-listing__container -->
</section><!-- end of b-listing -->
