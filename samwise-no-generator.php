<?php

// remove WordPress version
add_filter( 'the_generator', create_function( false, "return '';" ) );

