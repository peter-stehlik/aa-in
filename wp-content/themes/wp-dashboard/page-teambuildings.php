<?php
/*
    Template Name: Teambuildings
*/
?>

<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="relative flex-1 min-h-[85vh] xl:ml-60 px-4 xl:px-16 pt-20">
            <div class="container border-neutral-500 border-b border-dotted mb-8 xl:mb-16">
                <div class="flex flex-col xl:flex-row xl:items-center">
                    <?php echo get_template_part("template-parts/content", "ilustration-img"); ?>
                    
                    <div class="ml-8 mb-8 xl:mb-0">
                        <h1 class="py-2 text-4xl xl:text-6xl text-primary"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <div class="container flex flex-col" id="detail">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
                <div class="prose mb-8 prose-p:text-lg prose-headings:text-primary prose-headings:font-normal prose-h2:text-3xl prose-a:text-secondary hover:prose-a:no-underline"> 
                    <?php the_content(); ?>
                </div>

            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

                <?php
                    $actions = [];

                    $args = [
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'post_type' => 'teambuildings',
                    ];
                    $the_query = new WP_Query($args);

                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            $action = [
                                "month" => get_the_time("F"),
                                "year" => get_the_time("Y"),
                                "title" => get_the_title(),
                                "permalink" => get_the_permalink(),
                                "thumbnail" => get_the_post_thumbnail_url($post, 'medium'),
                            ];

                            array_push($actions, $action);
                        endwhile;
                    endif;

                   /* echo "<pre>";
                    print_r($actions);
                    echo "</pre>";*/
                ?>

				<div class="relative -top-8 flex flex-col md:max-w-[704px] pt-12 md:pt-24 pb-20 md:pb-32 md:mb-8">
					<div class="absolute top-0 left-[91.666666667%] md:left-1/2 w-px h-full border-r border-gray-300 translate-x-[22px] md:translate-x-0">
						<div class="absolute left-0 top-0 w-px h-20 bg-gradient-to-b from-gray-100 to-gray-300"></div>
						<div class="absolute left-0 bottom-0 w-px h-20 bg-gradient-to-t from-gray-100 to-gray-300"></div>
					</div>

                    <?php foreach( $actions as $key => $item ): ?>
                        <section class="relative w-11/12 md:max-w-xs rounded-lg mt-8 <?php if($key % 2 != 0): ?> md:ml-96 <?php endif; ?> shadow-lg bg-white text-right md:text-left">
                            <?php if( !empty($item["thumbnail"]) ): ?>
                                <a href="<?php echo $item["permalink"]; ?>">
                                    <img class="max-h-56 rounded-lg rounded-b-none object-cover" src="<?php echo $item["thumbnail"]; ?>" alt="<?php echo $item["title"]; ?>" width="320" height="214">
                                </a>
                            <?php endif; ?>

                            <div class="p-4">
                                <h2 class="font-bold text-xl text-primary">
                                    <a href="<?php echo $item["permalink"]; ?>"><?php echo $item["title"]; ?></a>
                                </h2>

                                <a class="text-sm text-gray-500" href="<?php echo $item["permalink"]; ?>"><?php echo $item["month"]; ?> <?php echo $item["year"]; ?></a>
                            </div>

                            <span class="absolute top-1/2 -right-8 <?php if($key % 2 == 0): ?> md:-right-10 <?php else: ?> md:-left-10 <?php endif; ?> w-4 h-4 rounded-full border-2 border-gray-100 md:-translate-y-2 md:-translate-x-px bg-quaternary"></span>
                        </section>
                    <?php endforeach; ?>
				</div>
			</div>

            <?php get_footer("html"); ?>
		</main>
	</div>
    
    <?php get_footer("html"); ?> 

<?php get_footer("foot"); ?>