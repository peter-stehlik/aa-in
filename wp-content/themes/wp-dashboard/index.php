<?php get_header('head'); ?>
<body <?php body_class(); ?>>
    <?php get_header('html'); ?>

	<div class="flex h-screen">		
        <?php get_sidebar(); ?>

		<main class="flex-1 lg:ml-60 px-4 lg:px-8 pt-20">
			<div class="container flex flex-col">
				<form class="lg:mt-5 mb-5 lg:mb-10" action="#">
					<input class="w-full max-w-md py-4 pl-5 pr-20 border-primary focus:border-quaternary focus:ring-primary bg-green rounded-full text-2xl bg-[url('/assets/img/icn-search.svg')] bg-no-repeat bg-right bg-[length:80px_40px]" type="text" placeholder="čo hľadáte?">
				</form>

				<div class="flex flex-wrap -mx-2 mb-8">
					<div class="w-full sm:w-1/2 lg:w-2/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-quaternary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="w-full rounded-lg object-cover" src="./assets/img/og-image.jpg" height="192" alt="" style="height: 227px;">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">TB info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Celofiremná akcia už čoskoro.</a></h2>
							</div>
						</article>
					</div>

					<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 lg:invisible hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-secondary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="rounded-lg" src="./assets/img/caoursel2.jpg" alt="">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">Raňajky info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Raňajky v štýle indickej kuchyne.</a></h2>
							</div>
						</article>
					</div>

					<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-secondary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="rounded-lg" src="./assets/img/caoursel1.jpg" alt="">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">TB info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Najbližšie sa stretneme na lezeckej stene.</a></h2>
							</div>
						</article>
					</div>

					<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-secondary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="rounded-lg" src="./assets/img/caoursel3.jpg" alt="">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">Dovolenky info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Celozávodná dovolenka tento rok nebude.</a></h2>
							</div>
						</article>
					</div>

					<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-quaternary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="rounded-lg" src="./assets/img/caoursel2.jpg" alt="">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">Office info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Tento týždeň upratujú devopsáci.</a></h2>
							</div>
						</article>
					</div>

					<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-secondary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="rounded-lg" src="./assets/img/caoursel3.jpg" alt="">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">Dovolenky info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Celozávodná dovolenka tento rok nebude.</a></h2>
							</div>
						</article>
					</div>

					<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-quaternary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="rounded-lg" src="./assets/img/caoursel2.jpg" alt="">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">Raňajky info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Raňajky v štýle indickej kuchyne.</a></h2>
							</div>
						</article>
					</div>

					<div class="w-full sm:w-1/2 lg:w-1/3 mb-4 px-2 hover:drop-shadow-xl hover:-translate-y-1 transition-transform duration-500">
						<article class="h-full bg-secondary p-4 rounded-lg text-white">
							<figure>
								<a href="#">
									<img class="rounded-lg" src="./assets/img/caoursel2.jpg" alt="">
								</a>
							</figure>

							<div class="pt-4">
								<span class="text-sm text-green"><a class="hover:border-b border-green" href="#">Office info</a></span>
								<h2 class="text-xl lg:text-3xl"><a class="hover:underline focus:text-green" href="#">Tento týždeň upratujú devopsáci.</a></h2>
							</div>
						</article>
					</div>
				</div>

				<div class="flex justify-between items-center py-4 mb-20">
					<a href="#">Predošlé</a>
					<a href="#">Ďalšie</a>
				</div>

                <?php get_footer("html"); ?>
			</div>
		</main>
	</div>


<?php get_footer("foot"); ?>