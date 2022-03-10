<?php
    $user = wp_get_current_user();
	$rolesArr = $user->roles;
	$roles = implode(" ", $rolesArr);
?>
<body <?php body_class($roles); ?>>
	<header class="fixed top-0 left-0 z-20 flex w-full bg-black h-12 text-white">
		<div class="flex justify-between lg:justify-center items-center w-full lg:w-60 p-3 bg-secondary">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" width="160" height="50" alt="aardwark logo"></a>

			<a class="relative z-20 js-nav-toggler flex lg:hidden" href="javascript:void(0);">
				<svg class="w-10 h-8" id="hamburger">
					<line stroke="#fff" x1="0" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--top"></line>
					<line stroke="#fff" x1="0" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--middle"></line>
					<line stroke="#fff" x1="50%" y1="50%" x2="100%" y2="50%" class="hamburger__bar hamburger__bar--bottom"></line>
				</svg>			  
			</a>
		</div>

		<div class="hidden lg:flex flex-1 justify-between items-center">
			<div class="flex px-8">
				<p class="text-white">Vitajte <strong class="tracking-wide border-b border-white"><?php echo $user->display_name; ?></strong></p>
			</div>

			<div class="flex items-center h-full px-8">
				<a class="flex justify-center items-center px-4 py-1 border-2 border-white hover:bg-secondary rounded-full font-semibold tracking-wide text-sm" href="<?php echo wp_logout_url(); ?>">Odhlásiť sa</a>
			</div>
		</div>
	</header>