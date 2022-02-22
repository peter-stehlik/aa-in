<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
			<div class="container flex flex-col mx-auto lg:mx-0">
                <div class="prose prose-a:text-secondary hover:prose-a:no-underline xl:w-3/4 lg:pt-8 pb-20 mx-auto">
                    <h1 class="mb-2"><?php the_title(); ?></h1>

                    <?php
                        $args = [
                            'post_parent' => $post->ID,
                        ];
                        $children = get_children( $args );

                        if( !empty($children) ): ?>
                            <ul class="mt-8 mb-20">
                                <?php foreach( $children as $child ): ?>
                                    <li><a href="<?php echo $child->guid; ?>"><?php echo $child->post_title; ?></a></li>    
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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