const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
const PATHS = {
    public: path.resolve(__dirname, "public"),
    src: path.resolve(__dirname, "resources/vue")
};
mix.webpackConfig({
    resolve: {
        extensions: [".js", ".vue", ".json", ".scss"],
        alias: {
            "@": PATHS.src
        }
    }
});
mix.js("resources/vue/app.js", "public/js/app.js").version();
mix.sass("resources/sass/app.scss", "public/css/app.css", {
    precision: 5
});
