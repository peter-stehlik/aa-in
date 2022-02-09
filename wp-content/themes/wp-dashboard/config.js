module.exports = {
	config: {
		tailwindjs: "./tailwind.config.js",
		port: 9000
	},
	paths: {
		root: "./",
		src: {
			base: "./html/src",
			css: "./html/src/assets/css",
			js: "./html/src/assets/js",
			img: "./html/src/assets/img",
			separate: "./html/src/assets/separate"
		},
		dist: {
			base: "./html/dist",
			css: "./html/dist/assets/css",
			js: "./html/dist/assets/js",
			img: "./html/dist/assets/img",
			separate: "./html/dist/assets/separate"
		},
		build: {
			base: "./assets",
			css: "./assets/css",
			js: "./assets/js",
			img: "./assets/img",
			separate: "./assets/separate"
		}
	}
}