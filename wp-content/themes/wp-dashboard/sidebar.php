<aside class="nav-wrap fixed left-0 top-12 z-10 xl:flex flex-col w-full xl:w-60 xl:pt-10 h-screen bg-neutral-100 text-primary">
    <div class="sub-nav-wrap w-[200%] flex xl:w-full">
        <div class="flex-1 h-screen overflow-auto">
            <div class="mb-4 xl:mb-8 h-[46px]">
                <?php if( !is_home() ): ?>
                    <div class="mx-4 mt-4 xl:mt-0">
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </div>

			<div class="xl:hidden flex px-2">
				<?php $langs = icl_get_languages(); ?>
				
				<?php foreach( $langs as $lang ): ?>
					<?php if( $lang["active"] ): ?>
						<a class="px-2 uppercase cursor-default text-black font-semibold" href="javascript:void(0);"><?php echo $lang["code"]; ?></a>
					<?php else: ?>
						<a class="px-2 uppercase font-semibold" href="<?php echo $lang["url"]; ?>"><?php echo $lang["code"]; ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'top-menu',
                        'menu_class' => 'left-nav xl:pt-4 xl:mb-20',
                        'menu_id' => 'mainNav',
                        'container' => '',
                    )
                );
            ?>

            <div class="xl:hidden mt-2 px-4">
                <hr>
            </div>

            <ul class="left-nav xl:hidden">
                <li><a href="<?php echo wp_logout_url(); ?>"><?php _e("Odhlásiť", "intranetaa"); ?></a></li>
            </ul>
        </div>

        <div class="flex-1 xl:hidden overflow-auto h-screen">
            <div class="pt-5 pb-5 px-4">
                <a class="js-back-mob-nav inline-flex mb-4 text-xl" href="javascript:void(0);">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-full-right-medium.svg" width="30" height="20" alt="arrow white right" style="transform: rotate(180deg);">
                    
                    <span class="flex ml-2"><?php _e("Späť", "intranetaa"); ?></span>
                </a>

                <hr class="mb-4">

                <ul class="js-mob-sub-nav">

                </ul>
            </div>
        </div>
    </div>

    <div class="aside-aardwark relative -left-72 hidden xl:block h-48 mt-auto">
        <svg class="w-60 h-32" version="1.1" width="82" height="45" viewBox="0 0 82 45">
            <g transform="matrix(-1 0 0 1 41 22.5)"  >
            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill:#CCA0D7; fill-rule: nonzero; opacity: 1;"  transform=" translate(-41.5, -22)" d="M 63.4848 35.1457 C 54.5704 23.5057 60.5936 9.94561 60.5936 9.94561 C 60.5936 9.94561 52.8839 -2.53445 34.5733 0.465566 C 20.7199 2.74558 11.3237 17.3857 11.3237 17.3857 C 11.3237 17.3857 12.7692 11.9856 12.7692 8.2656 C 12.7692 4.78559 11.4441 2.98558 11.4441 2.98558 C 11.4441 2.98558 9.63716 6.34559 8.19158 6.7056 C 6.50508 7.1856 5.17997 4.90559 5.17997 4.90559 C 5.17997 4.90559 4.45718 6.8256 5.17997 10.9056 C 5.90276 15.3456 8.19158 21.8257 8.19158 21.8257 C 8.19158 21.8257 6.38462 24.9457 5.17997 28.4257 C 3.49347 33.1057 2.16836 38.7458 2.16836 38.7458 L 0 40.7858 C 0 40.7858 0.722787 41.7458 1.92743 42.3458 C 2.77068 42.8258 4.09579 42.9458 4.09579 42.9458 L 4.81858 39.7058 C 4.81858 39.7058 7.58926 33.3457 16.1422 29.0257 C 16.865 29.0257 17.4673 29.0257 18.1901 29.1457 C 18.0697 32.1457 15.6604 36.9457 15.1785 39.9458 C 14.4557 43.7858 21.0813 30.7057 23.4906 33.3457 C 23.4906 33.4657 23.611 33.4657 23.611 33.5857 C 23.7315 33.7057 23.7315 33.7057 23.852 33.8257 C 27.1045 38.1458 30.357 43.5458 29.9956 40.6658 C 29.3933 36.4657 26.2612 29.5057 28.1887 26.8657 C 29.1524 25.0657 31.6821 23.7457 34.5733 23.7457 C 37.1031 23.7457 39.2714 24.7057 40.4761 26.1457 C 43.9695 27.8257 38.7896 35.3857 37.5849 40.9058 C 36.8621 44.0258 41.6807 37.1857 45.8969 33.1057 C 49.8723 32.0257 56.6183 44.3858 55.5341 40.5458 C 54.3295 36.2257 52.2816 32.1457 54.209 30.9457 C 55.0522 31.4257 55.5341 31.7857 55.5341 31.7857 C 55.5341 31.7857 57.2206 35.9857 62.8824 39.7058 C 72.0377 45.7058 83 43.6658 83 43.6658 C 83 43.6658 69.7489 43.1858 63.4848 35.1457 Z" stroke-linecap="round" />
            </g>
        </svg>
    </div>
</aside>