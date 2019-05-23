// Gulp.js configuration
'use strict';

// source and build folders
const sass_path = {
    src         : '../src/scss/styles.scss',
    dist        : '../dist'
  };


// Gulp and plugins
const
  gulp          = require('gulp'),
  gutil         = require('gulp-util'),
  newer         = require('gulp-newer'),
  imagemin      = require('gulp-imagemin'),
  sass          = require('gulp-sass'),
  postcss       = require('gulp-postcss'),
  deporder      = require('gulp-deporder'),
  concat        = require('gulp-concat'),
  stripdebug    = require('gulp-strip-debug'),
  uglify        = require('gulp-uglify'),
  cleanCSS      = require('gulp-clean-css'),
  browserSync   = require('browser-sync').create()



// SASS
function style() {
  return gulp.src(sass_path.src)
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(gulp.dest(sass_path.dist))
    .pipe(browserSync.stream());
}



// WATCH
function watch() {
  browserSync.init(
    //browsersync with a php server
    {
      proxy: "http://localhost/wordpress/",
      notify: true,
    });

  gulp.watch('../src/scss/**/*.scss', style);
  gulp.watch('../**/*.php').on('change', browserSync.reload);
  gulp.watch('../src/js/**/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.watch = watch;

