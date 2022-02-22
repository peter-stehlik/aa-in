<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
			<div class="container flex flex-col mx-auto lg:mx-0">
                <div class="prose prose-a:text-secondary hover:prose-a:no-underline xl:w-3/4 lg:pt-8 pb-20 mx-auto">
                    <h1 class="mb-2"><?php printf( __( 'Výsledky pre: %s', 'aardwark' ), get_search_query() ); ?></h1>

                    <?php
                        if ( have_posts() ) :
                            // Start the Loop.
                            while ( have_posts() ) : the_post();

                                /*
                                    * Include the post format-specific template for the content. If you want to
                                    * use this in a child theme, then include a file called called content-___.php
                                    * (where ___ is the post format) and that will be used instead.
                                    */
                                get_template_part( 'content', get_post_format() );

                            endwhile;
                            // Previous/next post navigation.
                        else :
                            get_template_part( 'content', get_post_format() );
                        endif;
                    ?>
                </div>

				<?php get_footer("html"); ?>
			</div>
		</main>
	</div>


<?php get_footer("foot"); ?>