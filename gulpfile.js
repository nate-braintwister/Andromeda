"use strict";

const   gulp = require('gulp'),
        sass = require('gulp-sass'),
        prefix = require('gulp-autoprefixer'),
        clean = require('gulp-clean-css'),
        rename = require('gulp-rename'),
        util = require('gulp-util'),
        minify = require('gulp-minify');




// Stylesheet tasks
gulp.task('sass', function (){
    gulp.src(['./dev/sass/*.scss'])
        .pipe(sass({
            includePaths: ['./dev/sass'],
            outputStyle: 'expanded'
        }))
        .pipe(prefix({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./dev/css'))
        .pipe(clean())
        .pipe(rename('styles.min.css'))
        .pipe(gulp.dest('./public/css'));
});

// Script tasks
gulp.task('compress', function() {
    gulp.src('./dev/js/*.js')
        .pipe(minify({
            ext:{
                src:'-debug.js',
                min:'.js'
            },
            exclude: ['tasks'],
            ignoreFiles: ['.combo.js', '-min.js']
        }))
        .pipe(gulp.dest('./public/js'))
});


gulp.task('default', function () {
    gulp.watch('./dev/sass/**/*.scss', ['sass']);
});