<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
			<div class="container flex flex-col">
                <?php
                    $archiveTitle = get_the_archive_title();
                    $archiveTitleArr = explode(":", $archiveTitle);
                    array_shift($archiveTitleArr);
                    $archiveTitle = implode(" ", $archiveTitleArr);
                ?>
                <h1 class="lg:mt-5 mb-8 text-primary text-3xl lg:text-6xl"><?php echo $archiveTitle; ?></h1>

				<div class="flex flex-wrap -mx-2 mb-8">
					<?php $loop = 1; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
								<article class="h-full <?php if( $loop == 2 || $loop == 6 ): ?> bg-quaternary <?php else: ?> bg-secondary <?php endif; ?> p-4 rounded-lg text-white">
									<figure>
										<a href="<?php the_permalink(); ?>">
											<?php if( get_the_post_thumbnail() ): ?>
												<?php the_post_thumbnail("medium", ['class' => 'rounded-lg object-cover']) ?>
											<?php else: ?>
												<span style="display: flex; justify-content: center; padding: 3rem 0;">
													<img src="<?php echo get_template_directory_uri(); ?>/assets/img/aardwark-green.svg" width="150" height="120" alt="aardwark">
												</span>
											<?php endif; ?>
										</a>
									</figure>

									<div class="pt-4">
										<?php
											$current_post_categories = get_the_category(); 
											foreach( $current_post_categories as $category): ?>
												<span class="text-sm text-green"><a class="hover:border-b border-green" href="<?php echo home_url(); ?>?cat=<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a></span>
											<?php endforeach; ?>
										
										<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</div>
								</article>
							</div>
					<?php $loop++; endwhile; ?>

					<div class="w-full py-4">
						<div class="flex justify-between items-center w-full px-2 mt-8 mb-20">
							<?php previous_posts_link( 'Predošlé' ); ?>
							<?php next_posts_link( 'Ďalšie' ); ?>
						</div>
					</div>

					<?php else : ?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
				</div>

                <?php get_footer("html"); ?>
			</div>
		</main>
	</div>


<?php get_footer("foot"); ?>