<section class="b-base">
    <div class="b-base__container">
        <?php $block->get('content');?>

        <?php if($block->get('time_and_date')):?>
        <div class="c-event-row">
            <b><?php _e('Time', 'swiss');?>:</b><br />
            <?php echo $block->get('time_and_date');?>
        </div>
        <?php endif;?>

        <?php if($block->get('location')):?>
        <div class="c-event-row">
            <b><?php _e('Location', 'swiss');?>:</b><br />
            <?php echo $block->get('location');?>
        </div>
        <?php endif;?>

        <?php if($block->get('requirements')):?>
        <div class="c-event-row">
            <b><?php _e('Requirements', 'swiss');?>:</b><br />
            <?php echo $block->get('requirements');?>
        </div>
        <?php endif;?>

        <?php if($block->get('organizer')):?>
        <div class="c-event-row">
            <b><?php _e('Organizer', 'swiss');?>:</b><br />
            <?php echo $block->get('organizer');?>
        </div>
        <?php endif;?>

        <?php if($block->get('additional_details')):?>
        <div class="c-event-row">
            <b><?php _e('Additional details', 'swiss');?>:</b><br />
            <?php echo $block->get('additional_details');?>
        </div>
        <?php endif;?>


    </div>
</section>
