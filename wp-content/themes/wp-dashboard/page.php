<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="relative flex-1 min-h-[85vh] xl:ml-60 px-4 xl:px-16 pt-20">
            <?php echo get_template_part("template-parts/content", "desktop-subnav"); ?>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container border-neutral-500 border-b border-dotted mb-8 xl:mb-16">
                    <div class="flex flex-col xl:flex-row xl:items-center">
                        <?php echo get_template_part("template-parts/content", "ilustration-img"); ?>

                        <div class="ml-8 mb-8 xl:mb-0">
                            <h1 class="py-2 text-4xl xl:text-6xl text-primary">
                                <?php
                                    if( get_field("nadpis") ):
                                        the_field("nadpis");
                                    else:
                                        the_title();
                                    endif;
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="container flex flex-col xl:pl-8 2xl:pl-0" id="detail">
                    <?php
                    $args = [
                        'post_parent' => $post->ID,
                        'post_type' => 'page',
                    ];
                    $children = get_children( $args );

                    if( !empty($children) ): ?>
                        <div class="flex flex-wrap -mx-2 mb-8 xl:mb-96">
                            <?php foreach( $children as $child ): ?>
                                <section class="sm:w-1/2 xl:w-1/4 px-4 mb-8">
                                    <a class="flex items-center justify-center h-full min-h-[100px] px-4 py-2 bg-white rounded-lg hover:bg-green hover:text-white text-center" href="<?php echo $child->guid; ?>">
                                        <span class="text-lg"><?php echo $child->post_title; ?></span>
                                    </a>
                                </section>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( get_the_post_thumbnail() ): ?>
                        <div class="flex-1 flex items-center max-w-2xl pb-8 mt-8 xl:mt-0">
                            <?php the_post_thumbnail("large", ['class' => 'rounded-lg object-cover max-h-full']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="prose prose-p:text-lg prose-headings:text-primary prose-headings:font-normal prose-h2:text-3xl prose-a:text-secondary hover:prose-a:no-underline max-w-2xl"> 
                        <?php the_content(); ?>

                        <?php
                            echo get_template_part("template-parts/content", "gallery", [
                                "post_id" => $post->ID
                            ]);
                        ?>
                    </div>

                    <?php
                        $parent = $post->post_parent;
                        if($parent):
                    ?>
                        <div class="mt-20">
                            <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo get_permalink($parent); ?>"><?php _e("späť na", "intranetaa"); ?> <?php echo get_the_title($parent); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Prepáčte, nenašli sme žiadne príspevky.', 'intranetaa' ); ?></p>
            <?php endif; ?>

            <?php get_footer("html"); ?>            
		</main>
	</div>
    
    <?php get_footer("html"); ?>

<?php get_footer("foot"); ?>