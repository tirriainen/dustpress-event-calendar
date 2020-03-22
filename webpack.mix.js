const mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.sass('assets/src/app.scss', 'assets/dist')
	.js('assets/src/app.js', 'assets/dist')
	.tailwind();