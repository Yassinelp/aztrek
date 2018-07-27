const gulp  = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const livereload = require('gulp-livereload');

gulp.task('css', function(){
    console.log('comilation des css');
    gulp.src([
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'node_modules/font-awesome/css/font-awesome.css',
        'node_modules/select2/dist/css/select2.css',
        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
        'node_modules/summernote/dist/summernote-bs4.css'
    ])
        .pipe(concat('plugins.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('css/'))
        .pipe(livereload());
});

gulp.task('fonts', function(){
    gulp.src('node_modules/font-awesome/fonts/*')
            .pipe(gulp.dest('fonts/'))
    gulp.src('node_modules/summernote/dist/font/*')
            .pipe(gulp.dest('css/font/'))
})

gulp.task('js', function(){
    console.log('compilation des js');
    gulp.src([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/popper.js/dist/umd/popper.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'node_modules/select2/dist/js/select2.js',
        'node_modules/select2/dist/js/i18n/fr.js',
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
        'node_modules/summernote/dist/summernote-bs4.js',
        'js/script.js'
    ])
    .pipe(concat('plugins.js'))
    .pipe(gulp.dest('js/'));
});

gulp.task('watch', function(){
    livereload.listen();
    gulp.watch('css/*.css',['css']);
    gulp.watch('js/*.js',['js']);
});

gulp.task('default', ['css', 'js', 'fonts'], function(){
    console.log('default task');
});