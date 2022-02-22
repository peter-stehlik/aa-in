<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
			<div class="container flex flex-col mx-auto lg:mx-0">
                <div class="prose prose-a:text-secondary hover:prose-a:no-underline xl:w-3/4 lg:pt-8 pb-20 mx-auto">
                    <h1 class="mb-2"><?php the_title(); ?></h1>

                    <div class="flex items-center">
                        <time class="inline-flex mr-2 text-gray-500" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>

                        <div>
                            <?php
                            $current_post_categories = get_the_category(); 
                            foreach( $current_post_categories as $category): ?>
                                <span class="text-sm"><a href="<?php echo home_url(); ?>?cat=<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <?php if( get_the_post_thumbnail() ): ?>
                            <?php the_post_thumbnail("post-thumbnail", ['class' => 'rounded-lg object-cover']) ?>
                        <?php endif; ?>
                    
                        <?php the_content(); ?>

                    <?php endwhile; else : ?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
                </div>

				<?php get_footer("html"); ?>
			</div>
		</main>
	</div>


<?php get_footer("foot"); ?>