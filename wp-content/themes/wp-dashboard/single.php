<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-16 pt-20">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container border-neutral-500 border-b border-dotted mb-8 lg:mb-16">
                    <div class="flex flex-col lg:flex-row lg:items-center">                   
                        <div class="mb-8 lg:mb-0">
                            <h1 class="py-2 text-4xl lg:text-6xl text-primary"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>

                <div class="container flex flex-col lg:pl-8 2xl:pl-0" id="detail">
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
                        <div class="flex-1 flex items-center max-w-2xl pb-8 mt-8 lg:mt-0">
                            <?php the_post_thumbnail("large", ['class' => 'rounded-lg object-cover max-h-full']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="prose prose-p:text-lg prose-headings:text-primary prose-headings:font-normal prose-h2:text-3xl prose-a:text-secondary hover:prose-a:no-underline max-w-2xl"> 
                        <?php the_content(); ?>
                    </div>

                    <div class="mt-20">
                        <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo home_url(); ?>">späť na Aktuality</a>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

		</main>
	</div>
    
    <?php get_footer("html"); ?>

<?php get_footer("foot"); ?>