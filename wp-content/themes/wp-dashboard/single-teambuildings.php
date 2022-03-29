<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container border-neutral-500 border-b border-dotted mb-8 lg:mb-16">
                    <div class="flex flex-col lg:flex-row lg:items-center">
                        <div class="px-8 mb-4 lg:mb-0">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Ikona.svg" alt="<?php the_title(); ?>">
                        </div>
                        
                        <div class="mb-8 lg:mb-0">
                            <h1 class="text-4xl lg:text-6xl text-primary"><?php the_title(); ?></h1>
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

                        <?php $images = get_field('galeria'); ?>
                            
                        <?php if( !empty( $images ) ): ?>
                            <div class="glide glide relative" style="max-width: 90vw;">
                                <div data-glide-el="track" class="glide__track">
                                    <ul class="glide__slides" id="gallery">
                                        <?php foreach( $images as $image ): ?>
                                            <li class="glide__slide cursor-pointer" data-src="<?php echo esc_url($image['sizes']['large']); ?>">
                                                <img
                                                    class="rounded-lg object-cover"
                                                    width="370"
                                                    height="244"
                                                    srcset="<?php echo esc_url($image['sizes']['gallery']); ?>,
                                                                <?php echo esc_url($image['sizes']['gallery_2x']); ?> 2x"
                                                    src="<?php echo esc_url($image['sizes']['gallery']); ?>"
                                                    alt="<?php echo esc_attr($image['alt']); ?>"
                                                >
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <div class="glide__arrows absolute top-1/2 left-0 w-full" data-glide-el="controls">
                                    <button class="glide__arrow glide__arrow--left absolute -left-4 w-8 h-8 flex items-center justify-center -mt-4 rounded-full bg-quaternary hover:bg-primary bg-opacity-90 hover:bg-opacity-100" data-glide-dir="<">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.00059 6.36395L13.7285 6.36395" stroke="white"/>
                                            <path d="M6.09242 1.27279L1.00126 6.36395L6.09243 11.4551" stroke="white"/>
                                        </svg>						
                                    </button>

                                    <button class="glide__arrow glide__arrow--right absolute -right-4 w-8 h-8 flex items-center justify-center -mt-4 rounded-full bg-quaternary hover:bg-primary bg-opacity-90 hover:bg-opacity-100" data-glide-dir=">">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.9994 6.63605L0.271484 6.63605" stroke="white"/>
                                            <path d="M7.90758 11.7272L12.9987 6.63605L7.90757 1.54488" stroke="white"/>
                                        </svg>						
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-20">
                        <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo home_url('teambuildingy'); ?>">späť na Teambuildingy</a>
                    </div>
                </div>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

		</main>
	</div>
    
    <?php get_footer("html"); ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/separate/glidejs/css/glide.core.min.css">
	<script src="<?php echo get_template_directory_uri(); ?>/assets/separate/glidejs/js/glide.min.js"></script>

    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/separate/lightgalleryjs/css/lightgallery.min.css">
	<script src="<?php echo get_template_directory_uri(); ?>/assets/separate/lightgalleryjs/js/lightgallery.js"></script>

    <script defer>
		new Glide('.glide', {
			type: 'carousel',
			startAt: 0,
			perView: 2,
			breakpoints: {
				600: {
					perView: 1,
					peek: 50
				}
			}
		}).mount();

        
		var $gallery = document.getElementById('gallery');
		if( $gallery ){
			lightGallery($gallery);
		}
	</script>

<?php get_footer("foot"); ?>