<?php

// allow more tags in TinyMCE including iframes
function samwise_change_mce_options($options) {
    $ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';   
    if (isset($initArray['extended_valid_elements'])) {
        $options['extended_valid_elements'] .= ',' . $ext;
    } else {
        $options['extended_valid_elements'] = $ext;
    }
    return $options;
}

add_filter('tiny_mce_before_init', 'samwise_change_mce_options');


// tell the TinyMCE editor to use editor-style.css
// if you have issues with getting the editor to show your changes then use the following line:
// add_editor_style('editor-style.css?' . time());
//add_editor_style('editor-style.css');
