<?php /* So this file is a real mess, sorry. Didn't have time to fix this properly. */ ?>

<section class="b-listing">

    <div class="b-listing__container">

        <?php include get_template_directory().'/templates/_section-header.php'; ?>

        <?php if(!empty($block->get('posts'))): ?>
                <div class="c-card-carousel js-places-slider c-card-slider--places" data-card-color="<?php echo $block->get('color');?>">
                    <?php global $post; foreach($block->get('posts') as $k => $post): setup_postdata($post); ?>

                    <div class="c-card-carousel__slide">
                        <div class="c-card-slider">
                            <div class="c-card-slider__wrap">

                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="<?php the_title(); ?>" class="c-card-slider__card">
                                    <div class="c-card-slider__card__wrapper">
                                        <div class="c-card-slider__image" style="background-image:url(<?php echo \Evermade\Swiss\featuredImageUrl('medium-large');?>">
                                            <div class="c-card-slider__card__text">
                                                <span class="c-card-slider__card__headline"><?php the_title(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>

        <?php endif; ?>


    </div><!-- end of b-listing__container -->
</section><!-- end of b-listing -->
