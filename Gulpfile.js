var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');

gulp.task('css', function(){
    gulp.src('app/assets/sass/main.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 10 versions'))
        //.pipe(minifyCSS())
        .pipe(gulp.dest('public/css'))
});

gulp.task('watch', function(){
    gulp.watch('app/assets/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);