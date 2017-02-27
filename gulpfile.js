var gulp = require('gulp');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var minify = require('gulp-minify-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps  = require('gulp-sourcemaps');

var paths = {
    'dev': {
        'sass': 'style/',
        'js': 'script/'
    },
    'prod': {
        'css': '',
        'js': ''
    }
};

gulp.task('css', function() {
    return gulp.src(paths.dev.sass+'style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 10 versions'],
            cascade: false
        }))
        .pipe(minify({keepSpecialComments:0}))
        .pipe(concat('style.min.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.prod.css));
});

gulp.task('js', function(){
    return gulp.src(paths.dev.js+'script.js')
        .pipe(sourcemaps.init())
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(uglify())
        .pipe(concat('script.min.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.prod.js));
});

gulp.task('watch', function() {
  gulp.watch(paths.dev.sass + '/*.scss', ['css']);
  gulp.watch(paths.dev.js + '/*.js', ['js']);
});

gulp.task('default', ['css','js','watch']);
