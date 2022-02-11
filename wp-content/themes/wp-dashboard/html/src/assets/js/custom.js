let AA = {
    $menu: document.querySelector(".nav-wrap"),

    toggleMobNav: () => {
		let $el = document.querySelector(".js-nav-toggler");
		
		if( !$el ) {
			return;
		}

		$el.addEventListener("click", () => {
			let $hamburger = document.querySelector("#hamburger");

			if( $hamburger.classList.contains("is-opened") ){
				AA.helperCloseMobNav();
			} else {
				AA.helperOpenMobNav();
			}

			$hamburger.classList.toggle("is-opened");
		});
		/*
		document.querySelector(".js-back-mob-nav").addEventListener("click", () => {
			AA.helperOpenMobNav();
		});*/
	},
	helperCloseMobNav: () => {
		AA.$menu.classList.remove("is-ready", "is-opened");
	},
	helperOpenMobNav: () => {
		AA.$menu.classList.add("is-opened");
		AA.$menu.classList.remove("is-ready");
	},
}

AA.toggleMobNav();