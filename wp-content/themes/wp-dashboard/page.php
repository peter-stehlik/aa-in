<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-16 pt-20">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container border-neutral-500 border-b border-dotted mb-8 lg:mb-16">
                    <div class="flex flex-col lg:flex-row lg:items-center">
                        <?php echo get_template_part("template-parts/content", "ilustration-img"); ?>

                        <div class="ml-8 mb-8 lg:mb-0">
                            <h1 class="py-2 text-4xl lg:text-6xl text-primary">
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

                <div class="container flex flex-col lg:pl-8 2xl:pl-0" id="detail">
                    <?php
                    $args = [
                        'post_parent' => $post->ID,
                        'post_type' => 'page',
                    ];
                    $children = get_children( $args );

                    if( !empty($children) ): ?>
                        <div class="flex flex-wrap -mx-2 mb-8">
                            <?php foreach( $children as $child ): ?>
                                <section class="sm:w-1/2 lg:w-1/4 px-4 mb-8">
                                    <a class="flex justify-between hover:text-primary" href="<?php echo $child->guid; ?>">
                                        <span class="pr-4 text-xl"><?php echo $child->post_title; ?></span>

                                        <span class="flex items-center justify-center w-8 min-w-[2rem] h-8 border border-gray-200 rounded-full">
                                            <img  src="<?php echo get_template_directory_uri(); ?>/assets/img/Arrow.svg" alt="<?php echo $child->post_title; ?>">
                                        </span>
                                    </a>
                                </section>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( get_the_post_thumbnail() ): ?>
                        <div class="flex-1 flex items-center max-w-2xl pb-8 mt-8 lg:mt-0">
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
                            <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo get_permalink($parent); ?>">späť na <?php echo get_the_title($parent); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
            
		</main>
	</div>
    
    <?php get_footer("html"); ?>

<?php get_footer("foot"); ?>