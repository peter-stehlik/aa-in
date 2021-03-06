<?php get_header('head'); ?>
    <?php get_header('html'); ?>

	<div class="flex">		
        <?php get_sidebar(); ?>

		<main class="relative flex-1 min-h-[85vh] xl:ml-60 px-4 xl:px-16 pt-20">
            <?php echo get_template_part("template-parts/content", "desktop-subnav"); ?>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="container border-neutral-500 border-b border-dotted mb-8 xl:mb-16">
                    <div class="flex flex-col xl:flex-row xl:items-center">
                        <?php echo get_template_part("template-parts/content", "ilustration-img"); ?>
                        
                        <div class="ml-8 mb-8 xl:mb-0">
                            <h1 class="py-2 text-4xl xl:text-6xl text-primary"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>

            <div class="container flex flex-col xl:pl-8 2xl:pl-0" id="detail">
                <?php if( get_the_post_thumbnail() ): ?>
                    <div class="flex-1 flex items-center max-w-2xl pb-8 xl:py-8 mt-8 xl:mt-0">
                        <?php the_post_thumbnail("large", ['class' => 'rounded-lg object-cover']) ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-p:text-lg prose-headings:text-primary prose-headings:font-normal prose-h2:text-3xl prose-a:text-secondary hover:prose-a:no-underline max-w-2xl">

                        <?php if( empty(get_field("rezervovane")) ): ?>
                            
                            <div class="js-reserve flex items-center justify-between p-4 mb-8 rounded-lg bg-gray-200">
                                <h2 class="my-0">
                                    <span class="block text-sm font-normal"><?php _e("Cena", "intranetaa"); ?>: </span>
                                    <span><?php the_field("cena"); ?>&euro;</span>
                                </h2>

                                <a class="js-reserve-btn btn px-8 py-4 rounded-lg bg-primary hover:bg-secondary text-white font-semibold tracking-wide no-underline" href="javascript:void(0);"><?php _e("Rezervova??", "intranetaa"); ?></a>
                            </div>

                            <div class="js-preloader hidden flex items-center justify-between p-4 mb-8 rounded-lg bg-gray-200">
                                <div class="flex items-center justify-center w-full">
                                    <svg version="1.1" id="Layer_1" x="0px" y="0px"
                                        width="150px" height="150px" viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
                                    <g opacity="0.8">
                                        <path fill="#6846A0" d="M61.015,85.29c6.807,12.76,23.475,16.332,36.572,11.57c19.05-8.334,27.384-28.574,26.193-48.815
                                            c13.097,17.859,0,41.671-15.478,53.577c-14.287,9.525-32.146,8.334-42.637-4.357C62.572,92.624,61.205,88.323,61.015,85.29z"/>
                                        <path fill="#6846A0" d="M130.992,88.176c-7.212,24.161-36.977,36.067-59.598,26.542c-15.478-7.144-26.193-28.574-13.097-42.862
                                            c-4.762,16.668,7.144,34.527,23.812,36.909s34.527-3.572,44.3-17.89C129.181,87.627,130.731,86.463,130.992,88.176z"/>
                                        <path fill="#6846A0" d="M105.373,123.588c-24.455,16.133-58.982-4.107-63.744-32.682C40.438,77.81,49.963,61.142,64.25,61.142
                                            c-15.478,9.525-17.859,34.527-4.762,47.624c10.715,9.525,25.003,16.668,40.905,13.527
                                            C104.616,121.896,106.482,122.156,105.373,123.588z"/>
                                        <path fill="#6846A0" d="M61.118,130.35c-21.871-7.297-32.586-29.919-29.014-51.349c2.381-10.715,8.334-19.05,17.859-23.812
                                            c8.334-3.572,19.05-3.572,26.193,2.381c-16.668-3.572-33.337,9.525-34.527,26.193c-1.191,15.478,4.762,30.956,17.091,42.228
                                            C61.924,128.699,62.992,130.182,61.118,130.35z"/>
                                        <path fill="#6846A0" d="M87.605,65.255c-5.496-10.066-16.211-16.019-28.117-13.638c-25.003,4.762-35.718,29.765-34.527,52.386
                                            c-7.144-17.859-4.762-38.099,9.525-51.196c14.287-11.906,35.718-13.097,49.774,0.549C86.849,58.095,87.747,62.344,87.605,65.255z"
                                            />
                                        <path fill="#6846A0" d="M90.294,77.561c4.912-12.848-2.232-25.944-14.138-33.088c-21.431-11.906-39.29,3.572-57.149,14.287
                                            c9.525-22.621,36.909-33.337,59.53-23.812c11.906,5.953,20.24,19.05,17.957,31.839C94.909,71.954,92.49,75.593,90.294,77.561z"/>
                                        <path fill="#6846A0" d="M48.564,24.217c8.077-9.391,30.608-2.197,39.279,2.904c13.01,7.655,20.772,22.57,19.27,37.593
                                            C105.921,76.62,96.396,88.525,83.3,87.335c14.287-4.762,17.859-20.24,14.287-33.337c-5.953-17.859-25.003-29.765-44.165-28.052
                                            C49.24,25.982,47.408,25.562,48.564,24.217z"/>
                                        <path fill="#6846A0" d="M91.241,19.881c26.587,9.114,37.302,42.451,19.443,65.072c-9.525,10.715-26.193,16.668-38.099,5.953
                                            c9.525,3.572,19.05,0,26.193-5.953c17.859-16.668,11.906-45.243-5.121-60.326C90.608,21.694,89.544,20.078,91.241,19.881z"/>
                                        <animateTransform attributeName="transform"
                                                        attributeType="XML"
                                                        type="rotate"
                                                        from="0 75 75"
                                                        to="360 75 75"
                                                        dur="2s"
                                                        repeatCount="indefinite"/>
                                    </g>
                                    </svg>
                                </div>
                            </div>

                            <div class="js-reserved hidden flex items-center justify-center p-8 mb-8 rounded-lg bg-green">
                                <h2 class="my-0 uppercase tracking-wider text-white text-3xl"><?php _e("Rezervovan??", "intranetaa"); ?></h2>
                            </div>

                        <?php else: ?>

                            <div class="js-reserved flex items-center justify-center p-8 mb-8 rounded-lg bg-green">
                                <h2 class="my-0 uppercase tracking-wider text-white text-3xl"><?php _e("Rezervovan??", "intranetaa"); ?></h2>
                            </div>

                        <?php endif; ?>

                        <?php the_content(); ?>
                </div>

                <div class="mt-20">
                    <a class="btn px-8 py-4 border-2 border-primary rounded-full bg-white hover:bg-quaternary text-primary font-semibold tracking-wide no-underline" href="<?php echo home_url('aa-bazar'); ?>"><?php _e("sp???? na Baz??r", "intranetaa"); ?></a>
                </div>
			</div>

            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Prep????te, nena??li sme ??iadne pr??spevky.', 'intranetaa' ); ?></p>
            <?php endif; ?>

            <?php get_footer("html"); ?>
		</main>
	</div>
    
    
<?php $currentUser = wp_get_current_user(); ?>

<script>
    var getJSON = function(url, qs_params) {
        function buildQueryString(params) {
            return Object.entries(params).map(d => `${d[0]}=${d[1]}`).join('&');
        }

        return new Promise((resolve, reject) => {
            const qs = qs_params ? '?' + buildQueryString(qs_params) : '';
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `${url}${qs}`);

            xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                resolve(JSON.parse(xhr.responseText));
            } else {
                resolve(xhr.responseText);
            }
            };
            xhr.onerror = () => reject(xhr.statusText);
            xhr.send();
        });
    };

    document.addEventListener("DOMContentLoaded", function(event) {

        var $reserve = document.querySelector(".js-reserve-btn");

        let reserve = function(){
            $reserve.addEventListener("click", el => {
                document.querySelector(".js-reserve").classList.add("hidden");
                document.querySelector(".js-preloader").classList.remove("hidden");

                getJSON(
                    "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                    {
                        action: 'aa_reserve',
                        postId: <?php echo $post->ID; ?>,
                        email: '<?php echo $currentUser->user_email; ?>',
                        title: '<?php the_title(); ?>',
                        permalink: '<?php the_permalink(); ?>',
                    }
                )
                .then(data => {
                    console.log(data);
                    
                    if( data = 1 ){
                        document.querySelector(".js-preloader").classList.add("hidden");
                        document.querySelector(".js-reserved").classList.remove("hidden");
                    } else {
                        alert("<?php _e('Vyskytla sa chyba. Kontaktujte pros??m podporu.', 'intranetaa'); ?>");
                    }
                });
            });
        };

        if( $reserve ){
            reserve();
        }
    });
</script>


<?php get_footer("foot"); ?>