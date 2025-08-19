let mix = require("laravel-mix");

mix.webpackConfig({
	externals: {
		jquery: "jQuery",
	},
});

// Get build target from environment variable
const buildTarget = process.env.BUILD_TARGET || "all";

// Common options
const commonOptions = {
	processCssUrls: false,
	postCss: [require("autoprefixer")],
};

// Build configurations based on target
switch (buildTarget) {
	case "main":
		mix.js(["src/js/main.js"], "js").sass("src/scss/main.scss", "css").sourceMaps().options(commonOptions).sourceMaps(true, "source-map").setPublicPath("dist");
		break;

	case "custom-editor":
		mix.sass("src/scss/custom-editor-style.scss", "css/custom-editor-style.min.css").sourceMaps().options(commonOptions).sourceMaps(true, "source-map").setPublicPath("dist");
		break;

	case "block-editor":
		mix.sass("src/scss/block-editor-style.scss", "css/block-editor-style.min.css").sourceMaps().options(commonOptions).sourceMaps(true, "source-map").setPublicPath("dist");
		break;

	default: // 'all' or no target specified
		mix.js(["src/js/main.js"], "js").sass("src/scss/main.scss", "css").sass("src/scss/custom-editor-style.scss", "css/custom-editor-style.min.css").sass("src/scss/block-editor-style.scss", "css/block-editor-style.min.css").sourceMaps().options(commonOptions).sourceMaps(true, "source-map").setPublicPath("dist");
}

// Only add BrowserSync for main and all builds
if (buildTarget === "main" || buildTarget === "all") {
	mix.browserSync({
		proxy: "boilerplatewpmix.local",
		files: ["src/**/*.css", "src/**/*.scss", "src/**/*.js", "./**/*.html", "./**/*.php"],
		open: false,
		reloadDelay: 1000,
	});
}
