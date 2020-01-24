<?php

// create a new block object to work with
$block = new \Evermade\Swiss\Block(['content', 'time_and_date', 'location', 'requirements', 'organizer', 'additional_details']);

include (__DIR__.'/templates/view.php');
