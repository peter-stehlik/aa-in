<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="relative flex-1 min-h-[85vh] xl:ml-60 px-4 xl:px-16 pt-20">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container border-neutral-500 border-b border-dotted mb-8 xl:mb-16">
                    <div class="flex flex-col xl:flex-row xl:items-center">                   
                        <div class="mb-8 xl:mb-0">
                            <h1 class="py-2 text-4xl xl:text-6xl text-primary"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>

                <div class="container flex flex-col xl:pl-8 2xl:pl-0" id="detail">
                    <div class="flex items-center mb-4">
                        <time class="inline-flex mr-2 text-primary" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>

                        <div>
                            <?php
                            $current_post_categories = get_the_category(); 
                            foreach( $current_post_categories as $category): ?>
                                <span class="text-sm text-green"><a href="<?php echo home_url(); ?>?cat=<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if( get_the_post_thumbnail() ): ?>
                        <div class="flex-1 flex items-center max-w-2xl pb-8 mt-8 xl:mt-0">
                            <?php the_post_thumbnail("large", ['class' => 'rounded-lg object-cover max-h-full']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="prose prose-p:text-lg prose-headings:text-primary prose-headings:font-normal prose-h2:text-3xl prose-a:text-secondary hover:prose-a:no-underline max-w-2xl"> 
                        <?php the_content(); ?>
                    </div>

                    <div class="mt-20">
                        <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo home_url(); ?>"><?php _e( 'späť na Aktuality', 'intranetaa' ); ?></a>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Prepáčte, nenašli sme žiadne príspevky.', 'intranetaa' ); ?></p>
            <?php endif; ?>

            <?php get_footer("html"); ?>
		</main>
	</div>
    

<?php get_footer("foot"); ?>