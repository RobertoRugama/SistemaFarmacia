var gulp = require('gulp');

gulp.task('default', function() {
  // place code for your default task here
});

const elixir = requiere('laravel-elixir');
requiere('laravel-elixir-vue-2');
elixir(mix=> {
	mix.sass('app.scss')
	webpack('app.js');

	mix.copy('node_modules/sweetalert/dist/','public/sweetalert/');
});