const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const rename = require('gulp-rename');
const terser = require('gulp-terser');
const browsersync = require('browser-sync').create();
const fs = require('fs');

// Load config
const config = JSON.parse(fs.readFileSync('./gulpconfig.json'));
const paths = config.paths;

// Sass Task
function scssTask() {
    return src(paths.scssMain, { sourcemaps: true })
        .pipe(sass().on('error', sass.logError))
        .pipe(rename('theme.css')) // Output theme.css
        .pipe(dest(paths.cssDest))
        .pipe(rename({ basename: 'theme', suffix: '.min' })) // Output theme.min.css dan theme.min.css.map
        .pipe(postcss([cssnano()]))
        .pipe(dest(paths.cssDest, { sourcemaps: '.' }));
}

// Javascript Task
function jsTask() {
    return src(paths.jsMain, { sourcemaps: true })
        .pipe(terser())
        .on('error', function (err) { console.error('Error in jsTask', err.toString()); this.emit('end'); }) // Handle error
        .pipe(rename('theme.js')) // Output theme.js
        .pipe(dest(paths.jsDest))
        .pipe(rename({ basename: 'theme', suffix: '.min' })) // Output theme.min.js dan theme.min.js.map
        .pipe(dest(paths.jsDest, { sourcemaps: '.' }));
}

// Browsersync Tasks
function browsersyncTask(cb) {
    browsersync.init({
        proxy: config.browsersync.proxy // Ganti dengan URL lokal WordPress Anda
    });
    cb();
}

function browsersyncReload(cb) {
    browsersync.reload();
    cb();
}

// Watch Task
function watchTask() {
    watch('*.php', browsersyncReload); // Reload saat file PHP berubah
    watch([paths.scss, paths.js], series(scssTask, jsTask, browsersyncReload));
}

// Default Gulp task
exports.default = series(
    scssTask,
    jsTask,
    browsersyncTask,
    watchTask
);
