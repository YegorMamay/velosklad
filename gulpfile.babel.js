'use strict';

import gulp from 'gulp';
import sass from 'gulp-sass';
import browser_sync from 'browser-sync';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';

const browserSync = browser_sync.create();

gulp.task('sass', () => {
    return gulp.src('sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded', // nested, expanded, compact, compressed
            precision: 5,
            includePaths: ['sass'],
            indentType: 'space',
            indentWidth: 2,
            linefeed: 'crlf',
            sourceComments: false,
        }).on('error', sass.logError))
        .pipe(autoprefixer({cascade: false, grid: 'autoplace'}))
        .pipe(sourcemaps.write('/'))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
});

gulp.task('watch', () => {
    gulp.watch('sass/**/*.scss', gulp.series('sass'));
});

gulp.task('default', () => {
    browserSync.init({
        baseDir: './',
        ghostMode: false,
    });

    gulp.watch('sass/**/*.scss', gulp.series('sass'));
    gulp.watch('js/*.js').on('change', browserSync.reload);
    gulp.watch('**/*.php').on('change', browserSync.reload);
});
