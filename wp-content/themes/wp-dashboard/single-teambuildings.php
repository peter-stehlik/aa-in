<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="relative flex-1 min-h-[85vh] lg:ml-60 px-4 lg:px-16 pt-20">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container border-neutral-500 border-b border-dotted mb-8 lg:mb-16">
                    <div class="flex flex-col lg:flex-row lg:items-center">
                        <?php echo get_template_part("template-parts/content", "ilustration-img"); ?>
                        
                        <div class="ml-8 mb-8 lg:mb-0">
                            <h1 class="py-2 text-4xl lg:text-6xl text-primary"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>

                <div class="container flex flex-col lg:pl-8 2xl:pl-0" id="detail">
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

                    <div class="mt-20">
                        <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo home_url('teambuildingy'); ?>">späť na Teambuildingy</a>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

            <?php get_footer("html"); ?>
		</main>
	</div>
    

<?php get_footer("foot"); ?>