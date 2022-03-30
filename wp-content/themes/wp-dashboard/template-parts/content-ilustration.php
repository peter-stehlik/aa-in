<?php

$post_id = $args["post_id"];

if( !isset($post_id) ){
    return;
}

if( !get_field("ilustration", $post_id) ){
    return;
}

switch( get_field("ilustration", $post_id) ){
    case "benefity":
        echo get_template_part("template-parts/svg/content", "animation-benefity");
        break;
    case "bazar":
        echo get_template_part("template-parts/svg/content", "animation-bazar");
        break;
    case "zoho":
        echo get_template_part("template-parts/svg/content", "animation-zoho");
        break;
    case "vzdelavanie":
        echo get_template_part("template-parts/svg/content", "animation-vzdelavanie");
        break;
    case "onboarding":
        echo get_template_part("template-parts/svg/content", "animation-onboarding");
        break;
    case "info":
        echo get_template_part("template-parts/svg/content", "animation-info");
        break;
    case "teambuildingy":
        echo get_template_part("template-parts/svg/content", "animation-teambuildingy");
        break;
}