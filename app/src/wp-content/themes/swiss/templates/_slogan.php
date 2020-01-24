<?php if (get_field('opt_primary_tagline', 'option') && get_field('opt_secondary_tagline', 'option')):?>
<div class="c-slogan">
<p><?php if (get_field('opt_primary_tagline', 'option')):?><span><?php the_field('opt_primary_tagline', 'option');?></span><?php endif;?><?php the_field('opt_secondary_tagline', 'option');?></p>
</div>
<?php endif;?>