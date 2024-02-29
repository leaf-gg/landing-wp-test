const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser');

// Sass Task
function scssTask(){
  return src('src/scss/main.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// JavaScript Task
function jsTask(){
  return src('src/js/*.js', { sourcemaps: true })
    .pipe(terser())
    .pipe(concat('script.js'))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// Watch Task
function watchTask(){
  watch(['src/scss/**/*.scss', 'src/js/**/*.js'], series(scssTask, jsTask));
}

// Default Gulp task
exports.default = series(
  scssTask,
  jsTask,
  watchTask
);