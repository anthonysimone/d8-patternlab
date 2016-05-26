"use strict";

/************************
 * SETUP
 ************************/

var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var livereload = require('gulp-livereload');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sassdoc = require('sassdoc');
var babel = require('gulp-babel');

/************************
 * CONFIGURATION
 ************************/

var autoReload = true;

var paths = {
  bowerDir: './bower_components'
};

var includePaths = [
  // add paths to any sass @imports that you will use from bower_components here
  // paths.bowerDir + '/path/to/scss'
  paths.bowerDir + '/foundation-sites/scss'
];

var stylesSrc = [
  // add bower_components CSS here
  './sass/style.scss'
];

var sassdocSrc = [
  './sass/base/*.scss',
  './sass/layout/*.scss',
  './sass/components/*.scss'
];

var scriptsSrc = [
  // add bower_component scripts here
  // foundation core
  paths.bowerDir + '/foundation-sites/js/foundation.core.js',
  // foundation utils
  //paths.bowerDir + '/foundation-sites/js/foundation.util.box.js',
  //paths.bowerDir + '/foundation-sites/js/foundation.util.mediaQuery.js',
  //paths.bowerDir + '/foundation-sites/js/foundation.util.motion.js',
  //paths.bowerDir + '/foundation-sites/js/foundation.util.nest.js',
  //paths.bowerDir + '/foundation-sites/js/foundation.util.timerAndImageLoader.js',
  //paths.bowerDir + '/foundation-sites/js/foundation.util.touch.js',
  //paths.bowerDir + '/foundation-sites/js/foundation.util.triggers.js',
  // foundation components
  paths.bowerDir + '/foundation-sites/js/foundation.tabs.js',

  // Add all theme javascript with a glob
  './js/src/*.js'
];

/************************
 * TASKS
 ************************/

gulp.task('styles', function() {
  gulp.src(stylesSrc)
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: includePaths
    }))

    // Catch any SCSS errors and prevent them from crashing gulp
    .on('error', function (error) {
      console.error(error);
      this.emit('end');
    })
    .pipe(autoprefixer('last 2 versions', '> 1%', 'ie 8'))
    .pipe(sourcemaps.write())
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./css/src/'))
    .pipe(livereload())
    .pipe(minifyCss({
      compatibility: 'ie8',
      // turn off minifyCss sourcemaps so they don't conflict with gulp-sourcemaps and includePaths
      sourceMap: false
    }))
    .pipe(gulp.dest('./css/dist/'))
    .pipe(livereload());
});

gulp.task('sassdoc', function () {
  return gulp.src(sassdocSrc)
    .pipe(sassdoc());
});

gulp.task('scripts', function() {
  gulp.src(scriptsSrc)
    .pipe(sourcemaps.init())
    .pipe(babel())
    .pipe(concat('theme.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./js/dist/'))
    .pipe(livereload())
    .pipe(uglify())
    .pipe(rename({
      extname: '.min.js'
    }))
    .pipe(gulp.dest('./js/dist/'))
    .pipe(livereload())
});

gulp.task('watch', function() {
  if (autoReload) {
    livereload.listen();
  }
  gulp.watch('./sass/**/*.scss', ['styles']);
  gulp.watch('./js/src/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);
