'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var zip = require('gulp-zip');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var browserSync = require('browser-sync'),
    reload = browserSync.reload;

/**
 * Process Sass Files
 */

gulp.task('sass', function () {
    return gulp.src( ['./public/sass/**/*.scss'] )
        .pipe(plumber())
        .pipe(sass.sync({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(plumber.stop())
        //.pipe(autoprefixer({browsers: ['last 4 versions'],cascade: false}))
        .pipe(gulp.dest('./public/css'))
        .pipe(reload({stream:true}));
});

/**
 * Auto Prefixer
 */
gulp.task('autopre', function () {
    return gulp.src('css/main.css')
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./css'));
});

/**
 * Watch sass file changes
 */
gulp.task('watch-sass', function() {
    gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('minify-css', function() {
    return gulp.src('./css/**/*.css')
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist'));
});

/**
 * Default Task
 */
gulp.task('default',['browser-sync', 'watch-sass']);

/**
 * Build Theme Zip
 */
gulp.task('zip', function () {
    return gulp.src( [
            // Include
            './**/*',

            // Exclude
            '!./prepros.cfg',
            '!./**/.DS_Store',
            '!./sass/**/*.scss',
            '!./sass',
            '!./node_modules/**',
            '!./node_modules',
            '!./package.json',
            '!./gulpfile.js'
        ])
        .pipe ( zip ( 'InspiryWebsite.zip' ) )
        .pipe ( gulp.dest ( '../' ) )
        .pipe ( notify ( {
            message : 'Inspiry Website theme zip is ready.',
            onLast : true
        } ) );
});