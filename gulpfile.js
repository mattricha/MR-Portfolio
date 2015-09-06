var gulp = require('gulp');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var minify = require('gulp-minify-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

var paths = {
    'dev': {
        'sass': 'style/',
        'js': 'script/'
    },
    'production': {
        'css': '',
        'js': ''
    }
};

gulp.task('sass', function() {
    return gulp.src(paths.dev.sass+'style.scss')
        .pipe(sass())
        .pipe(gulp.dest(paths.production.css));
});

/*
gulp.task('css', function() {
    return gulp.src(paths.dev.sass+'style.css')
        .pipe(minify({keepSpecialComments:0}))
        .pipe(gulp.dest(paths.production.css));
});
*/

gulp.task('lint', function() {
    return gulp.src(paths.dev.js+'script.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

gulp.task('js', function(){
    return gulp.src(paths.dev.js+'script.js')
        .pipe(concat('script.min.js'))
        //.pipe(uglify())
        .pipe(gulp.dest(paths.production.js));
});

gulp.task('watch', function() {
  gulp.watch(paths.dev.sass + '/*.scss', ['sass']);
  gulp.watch(paths.dev.js + '/*.js', ['lint', 'js']);
});

gulp.task('default', ['sass','lint','js','watch']);
