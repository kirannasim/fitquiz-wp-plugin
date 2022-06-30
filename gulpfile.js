// Include gulp
const { src, watch, series, dest } = require('gulp');

// Include Our Plugins
const sass = require('gulp-sass')(require('sass'));
const pref = require('gulp-autoprefixer')
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const cleanCSS = require('gulp-clean-css');



// Compile Our Sass
function buildSass() {
    return src('./css/layout/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(dest('./css/layout/stylesheets'));
}




exports.buildSass = buildSass;

// Watch Files For Changes
exports.watch = function () {
  watch('./css/layout/sass/*.scss', series('buildSass') );
}

// Default Task
exports.default = function () {
  watch('./css/layout/sass/*.scss', series('buildSass') );
}
