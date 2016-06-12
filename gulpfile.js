var gulp = require('gulp');
var elixir = require('laravel-elixir');
var liveReload = require('gulp-livereload');
var clean = require('gulp-clean');
var es = require('event-stream');
var runSequence = require('run-sequence');
var vendorPath = './resources/bower_components/';
var htmlmin = require('gulp-htmlmin');
var jshint = require('gulp-jshint');
var buildPath = './public/build/';

var vendorScripts = [
    vendorPath + 'jquery/dist/jquery.min.js',
    vendorPath + 'bootstrap/dist/js/bootstrap.min.js',
    vendorPath + 'angular/angular.min.js',
    vendorPath + 'angular-animate/angular-animate.min.js',
    vendorPath + 'angular-bootstrap/ui-bootstrap.min.js',
    vendorPath + 'angular-messages/angular-messages.min.js',
    vendorPath + 'angular-resource/angular-resource.min.js',
    vendorPath + 'angular-route/angular-route.min.js',
    vendorPath + 'angular-strap/dist/modules/navbar.min.js',
    vendorPath + 'angular-cookies/angular-cookies.min.js',
    vendorPath + 'query-string/query-string.js',
    vendorPath + 'angular-oauth2/dist/angular-oauth2.min.js',
    vendorPath + 'angular-local-storage/dist/angular-local-storage.min.js'
];
var scripts = './resources/assets/js/**/*.js';
var allScripts = vendorScripts.concat(scripts);

var vendorStyles = [
    vendorPath + 'bootstrap/dist/css/bootstrap.min.css',
    vendorPath + 'bootstrap/dist/css/bootstrap-theme.min.css'
];
var styles = './resources/assets/css/**/*css';
var allStyles = vendorStyles.concat(styles);

gulp.task('jshint', function () {
    return gulp.src('./resources/assets/js/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter());

});

gulp.task('clean', function () {
    return gulp.src([
        buildPath, './public/js/', './public/css/', './public/views/'
    ]).pipe(clean());
});

gulp.task('copy-scripts', function () {
    return es.merge([
        gulp.src(vendorScripts).pipe(gulp.dest(buildPath + 'js/vendor')),
    
        gulp.src(scripts).pipe(gulp.dest(buildPath + 'js'))
    ])
    .pipe(liveReload());
});

gulp.task('copy-styles', function () {
    return es.merge([
        gulp.src(vendorStyles).pipe(gulp.dest(buildPath + 'css/vendor')),

        gulp.src(styles).pipe(gulp.dest(buildPath + 'css'))
    ])
    .pipe(liveReload());
    
});

gulp.task('copy-html', function () {
    return gulp.src('./resources/assets/views/**/*.html')
        .pipe(htmlmin({collapseWhitespace: true}))
        .pipe(gulp.dest(buildPath + 'views'))
        .pipe(liveReload());
});

gulp.task('copy-fonts', function () {
    return gulp.src('./resources/assets/fonts/**/*.*')
        .pipe(gulp.dest(buildPath + 'fonts'))
        .pipe(liveReload());
});

gulp.task('copy-images', function () {
    return gulp.src('./resources/assets/images/**/*.*')
        .pipe(gulp.dest(buildPath + 'images'))
        .pipe(liveReload());
});



gulp.task('watch-dev', ['clean'], function () {
    liveReload.listen();
    gulp.start('copy-styles', 'copy-scripts', 'copy-html', 'copy-fonts', 'copy-images');
    gulp.watch('resources/assets/**', ['copy-styles', 'copy-scripts', 'copy-html', 'copy-fonts', 'copy-images']);
});

gulp.task('minify', function () {
    return elixir(function (mix) {
        mix.styles(allStyles, 'public/css/all.css', './resources/assets')
        .scripts(allScripts, 'public/js/all.js', './resources/assets')
        .version(['css/all.css', 'js/all.js']);
    });    
});

gulp.task('default', function () {    
    return runSequence('clean', ['jshint', 'minify', 'copy-html', 'copy-fonts', 'copy-images']);
});