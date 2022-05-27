<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="relative flex-1 min-h-[85vh] xl:ml-60 px-4 xl:px-16 pt-20">
			<?php
				$archiveTitle = get_the_archive_title();
				$archiveTitleArr = explode(":", $archiveTitle);
				array_shift($archiveTitleArr);
				$archiveTitle = implode(" ", $archiveTitleArr);
			?>

			<div class="container border-neutral-500 border-b border-dotted mb-8 xl:mb-16">
				<div class="flex flex-col xl:flex-row xl:items-center">
					<div class="pl-8 mb-4 xl:mb-0">
						<?php echo get_template_part("template-parts/content", "ilustration-img"); ?>
					</div>
					
					<div class="ml-8 mb-8 xl:mb-0">
						<h1 class="py-2 text-4xl xl:text-6xl text-primary"><?php echo $archiveTitle; ?></h1>
					</div>
				</div>
			</div>

			<div class="container flex flex-col" id="detail">
				<div class="flex flex-wrap -mx-2 mb-8">
					<?php $loop = 1; ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="w-full sm:w-1/2 xl:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
							<article class="h-full bg-neutral-100 rounded-lg text-primary overflow-hidden">
								<figure class="relative">
									<?php if( !empty(get_field("rezervovane")) ): ?>
										<span class="absolute right-2 top-2 py-1 px-4 bg-green rounded-md text-black uppercase tracking-wide font-bold"><?php _e("rezervované", "intranetaa"); ?></span>
									<?php endif; ?>

									<a href="<?php the_permalink(); ?>">
										<?php if( get_the_post_thumbnail() ): ?>
											<?php the_post_thumbnail("gallery_2x", ['class' => 'object-cover']) ?>
										<?php else: ?>
											<span class="flex justify-center" style="padding: 3rem 0;">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/aardwark-green.svg" width="150" height="120" alt="aardwark">
											</span>
										<?php endif; ?>
									</a>
								</figure>

								<div class="p-4">
									<?php if( !is_category() ): ?>
										<?php
										$current_post_categories = get_the_category(); 
										foreach( $current_post_categories as $category): ?>
											<span class="text-sm text-green"><a class="hover:border-b border-green" href="<?php echo home_url(); ?>?cat=<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a></span>
										<?php endforeach; ?>
									<?php endif; ?>
									
									<h2 class="text-xl xl:text-3xl"><a class="hover:underline focus:text-green" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</div>
							</article>
						</div>
					<?php $loop++; endwhile; ?>

					<div class="w-full py-4">
						<div class="btn-secondary-wrap flex justify-between items-center w-full px-2 mt-8">
							<?php previous_posts_link( __( 'Predošlé', 'intranetaa' ) ); ?>
							<?php next_posts_link( __( 'Ďalšie', 'intranetaa' ) ); ?>
						</div>
					</div>

					<?php else : ?>
						<p><?php esc_html_e( 'Prepáčte, nenašli sme žiadne príspevky.', 'intranetaa' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			
			<?php get_footer("html"); ?>
		</main>
	</div>
	


<?php get_footer("foot"); ?>