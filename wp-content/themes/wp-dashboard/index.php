<?php get_header('head'); ?>
 <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-12">
			<div class="bg-primary px-4 lg:px-8 mb-8 rounded-lg">
				<div class="container mx-auto">
					<div class="flex flex-col lg:flex-row lg:h-[380px]">
						<div class="flex-1 flex flex-col justify-center pt-10 lg:py-20">
							<h1 class="mb-4 text-4xl lg:text-6xl text-white">Aardwark <br> Intranet</h1>
							
							<?php if( is_home() ): ?>
								<?php get_search_form(); ?> 
							<?php endif; ?>
						</div>

						<div class="svg-wrap flex-1">
							<?php echo get_template_part("template-parts/svg/content", "animation-green-aardwark"); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="container flex flex-col mx-auto">
				<h1 class="lg:mt-5 mb-8 text-primary text-3xl lg:text-6xl">Aktuality</h1>

				<div class="flex flex-wrap -mx-2">
					<?php $loop = 1; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php if( $loop == 1 ): ?>
							<div class="w-full sm:w-1/2 lg:w-2/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
								<article class="h-full bg-quaternary p-4 rounded-lg text-white">
									<figure>
										<a href="<?php the_permalink(); ?>">
											<?php if( get_the_post_thumbnail() ): ?>
												<?php the_post_thumbnail("gallery_2x", ['class' => 'w-full rounded-lg object-cover']) ?>
											<?php else: ?>
												<span class="flex justify-center" style="padding: 3rem 0;">
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

							<div class="w-full sm:w-1/2 lg:w-1/3 lg:invisible">

							</div>
						<?php else: ?>
							<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
								<article class="h-full <?php if( $loop == 4 || $loop == 5 || $loop == 9 ): ?> bg-quaternary <?php else: ?> bg-secondary <?php endif; ?> p-4 rounded-lg text-white">
									<figure>
										<a href="<?php the_permalink(); ?>">
											<?php if( get_the_post_thumbnail() ): ?>
												<?php the_post_thumbnail("gallery_2x", ['class' => 'rounded-lg object-cover']) ?>
											<?php else: ?>
												<span class="flex justify-center" style="padding: 3rem 0;">
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
						<?php endif; ?>
					<?php $loop++; endwhile; ?>

					<div class="w-full py-4">
						<div class="btn-secondary-wrap flex justify-between items-center w-full px-2 mt-8">
							<?php previous_posts_link( 'Predošlé' ); ?>
							<?php next_posts_link( 'Ďalšie' ); ?>
						</div>
					</div>

					<?php else : ?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<?php get_footer("html"); ?>
		</main>
	</div>


<?php get_footer("foot"); ?>