const mix = require('laravel-mix');

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
const config = require('./webpack.config')
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig(config)

mix.override(webpackConfig => {
    // BUG: vue-loader doesn't handle file-loader's default esModule:true setting properly causing
    // <img src="[object module]" /> to be output from vue templates.
    // WORKAROUND: Override mixs and turn off esModule support on images.
    // FIX: When vue-loader fixes their bug AND laravel-mix updates to the fixed version
    // this can be removed
    webpackConfig.module.rules.forEach(rule => {
        if (rule.test.toString() === '/(\\.(png|jpe?g|gif|webp|avif)$|^((?!font).)*\\.svg$)/') {
            if (Array.isArray(rule.use)) {
                rule.use.forEach(ruleUse => {
                    if (ruleUse.loader.includes('file-loader')) {
                        ruleUse.options.esModule = false;
                    }
                });
            }
        }
    });
});
mix.disableNotifications();
