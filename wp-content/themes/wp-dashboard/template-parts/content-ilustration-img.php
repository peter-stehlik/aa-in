<?php
    if( get_field("ilustration") ):
        $post_id = $post->ID;
    else:
        if( $post->post_parent ){
            $post_id = $post->post_parent;
        }

        if( is_single() ){
            $post_type = get_post_type();

            echo '<div class="pl-8 mb-4 lg:mb-0">';
                switch( $post_type ){
                    case "aa-bazos":
                        echo get_template_part("template-parts/svg/content", "animation-bazar");
                        break;
                    case "teambuildings":
                        echo get_template_part("template-parts/svg/content", "animation-teambuildingy");
                        break;
                }
            echo "</div>";
        }

    endif;
?>

<?php if( isset($post_id) && get_field("ilustration", $post_id) ): ?>
    <div class="pl-8 mb-4 lg:mb-0">
        <?php
            echo get_template_part("template-parts/content", "ilustration", [
                "post_id" => $post_id
            ]);
        ?>
    </div>
<?php endif; ?>