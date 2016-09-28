const elixir = require('laravel-elixir');

require('laravel-elixir-vue');
// require("laravel-elixir-react");
// require('laravel-elixir-livereload');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
	// mix.livereload();
    mix.sass('app.scss')
       .webpack('app.js');

    /* mix.react("react/app.jsx", {
    	output: "bundle.js",
        sourceMap: false,
        harmony: false,
        sourceFilename: "bundle.js.map",
        stripTypes: false
    }); */
});
