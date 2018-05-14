let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
/*   .sass(['resources/assets/sass/_alert.scss', 'resources/assets/sass/_badge.scss', 
	'resources/assets/sass/_breadcrumb.scss', 'resources/assets/sass/_button-group.scss', 
	'resources/assets/sass/_buttons.scss', 'resources/assets/sass/_card.scss', 
	'resources/assets/sass/_carousel.scss', 'resources/assets/sass/_close.scss', 
	'resources/assets/sass/_code.scss', 'resources/assets/sass/_custom-forms.scss', 
	'resources/assets/sass/_dropdown.scss', 'resources/assets/sass/_forms.scss', 
	'resources/assets/sass/_functions.scss', 'resources/assets/sass/_grid.scss', 
	'resources/assets/sass/_images.scss', 'resources/assets/sass/_input-group.scss', 
	'resources/assets/sass/_jumbotron.scss', 'resources/assets/sass/_list-group.scss', 
	'resources/assets/sass/_media.scss', 'resources/assets/sass/_mixins.scss', 
	'resources/assets/sass/_modal.scss', 'resources/assets/sass/_nav.scss', 
	'resources/assets/sass/_navbar.scss', 'resources/assets/sass/_pagination.scss', 
	'resources/assets/sass/_popover.scss', 'resources/assets/sass/_print.scss', 
	'resources/assets/sass/_progress.scss', 'resources/assets/sass/_reboot.scss', 
	'resources/assets/sass/_root.scss', 'resources/assets/sass/_tables.scss', 
	'resources/assets/sass/_tooltip.scss', 'resources/assets/sass/_transitions.scss', 
	'resources/assets/sass/_type.scss', 'resources/assets/sass/_utilities.scss', 
	'resources/assets/sass/_variables.scss', 'resources/assets/sass/_alert.scss'],
	'public/css/btp.css');
*/
	.sass('resources/assets/sass/bootstrap.scss', 'public/css/btp.css');
