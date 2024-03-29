let mix = require("laravel-mix");

mix.webpackConfig({
  externals: {
    jquery: "jQuery",
  },
});

mix
  .js(["src/js/main.js"], "js")
  .sass("src/scss/main.scss", "css")
  .sourceMaps()
  .options({
    processCssUrls: false,
    postCss: [require("autoprefixer")],
  })
  .sourceMaps(true, "source-map")
  .setPublicPath("dist");

mix.browserSync({
  proxy: "boilerplatewpmix.local",
  files: ["src/**/*.css", "src/**/*.scss", "src/**/*.js", "./**/*.html", "./**/*.php"],
	open: false,
  reloadDelay: 1000,
});
