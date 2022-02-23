<?php
/*
    Template Name: Teambuildings
*/
?>

<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
            <div class="container flex flex-col">
				<h1 class="md:max-w-[704px] pr-8 md:pr-0 md:mt-5 md:mb-8 text-right md:text-left text-primary text-3xl lg:text-6xl">Tímové akcie</h1>

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
                                "year" => get_the_time("Y"),
                                "title" => get_the_title(),
                                "permalink" => get_the_permalink(),
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

                    <?php
                        $current = 0;
                        $i = 0;
                        $lastKey = array_key_last($actions);
                    ?>
                    <?php foreach( $actions as $key => $item ): ?>
                        <?php if( $current != $item["year"] ): ?>
                            <?php if( $key != 0 ): ?>
                                </ul>

                                <span class="absolute top-1/2 -right-8 <?php if($i % 2 == 0): ?> md:-right-10 <?php else: ?> md:-left-10 <?php endif; ?> w-4 h-4 rounded-full border-2 border-gray-100 md:-translate-y-2 md:-translate-x-px bg-quaternary"></span>
                            </section>
                            <?php endif; ?>
                            
                            <section class="relative w-11/12 md:max-w-xs p-4 border border-gray-300 rounded-lg mt-8 <?php if($i % 2 == 0): ?> md:ml-96 <?php endif; ?> shadow-lg bg-white text-right md:text-left">
                                <h2 class="mb-2 font-bold text-xl text-primary"><?php echo $item["year"]; ?></h2>

                                <ul class="ml-4 list-disc">
                            <?php $i++; ?>
                        <?php endif; ?>

                        <li class="mb-1"><a class="border-b hover:border-0 border-black" href="<?php echo $item["permalink"]; ?>"><?php echo $item["title"]; ?></a></li>

                        <?php if( $key == $lastKey ): ?>
                                </ul>

                                <span class="absolute top-1/2 -right-8 <?php if($i % 2 == 0): ?> md:-right-10 <?php else: ?> md:-left-10 <?php endif; ?> w-4 h-4 rounded-full border-2 border-gray-100 md:-translate-y-2 md:-translate-x-px bg-quaternary"></span>
                            </section>
                        <?php endif; ?>

                        <?php $current = $item["year"]; ?>
                    <?php endforeach; ?>
				</div>

				<footer class="mt-auto pt-10 pb-4">
					<hr class="mb-4">

					<p class="text-gray-400"> Aardwark 2022 <span class="block lg:inline">&copy; Špecialisti na Enterprise IT riešenia</span></p>
				</footer>
			</div>
		</main>
	</div>


<?php get_footer("foot"); ?>