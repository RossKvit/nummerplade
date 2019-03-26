var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    imagemin = require('gulp-imagemin'),
    autoprefixer = require('gulp-autoprefixer'),
    uglyfly = require('gulp-uglyfly'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps');


gulp.task('sass', function(){
    return gulp.src('assets/scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/css'))
});

gulp.task('sass_prod', function(){
    return gulp.src('assets/scss/main.scss')
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('assets/css'))
});

gulp.task('js', function() {
    gulp.src(['./assets/js/*.js', '!./assets/js/scripts.min.js'] )
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.min.js'))
        .pipe(uglyfly())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/js/'))
});

gulp.task('js_prod', function() {
    gulp.src(['./assets/js/*.js', '!./assets/js/scripts.min.js'] )
        .pipe(concat('scripts.min.js'))
        .pipe(uglyfly())
        .pipe(gulp.dest('./assets/js/'))
});

gulp.task('compress', function() {
    gulp.src('assets/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('assets/build/images'))
});

gulp.task('watch',[ 'sass', 'js'], function() {
    gulp.watch(['./assets/js/*.js', '!./assets/js/scripts.min.js'], ['js']);
    gulp.watch('assets/scss/**/*.scss', ['sass']);
});




