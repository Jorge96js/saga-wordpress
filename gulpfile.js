import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import { src, dest, watch } from 'gulp';

const sass = gulpSass(dartSass);

export function css(done) {
    src('./src/scss/*.scss')
        .pipe(sass().on('error', sass.logError)) // Maneja errores
        .pipe(dest('build/css'));

    done();
}
export function javascript(done){
    src('./src/javascript/*.js')
        .pipe(dest('build/js'));

    done();
}
export function dev() {
    watch('./src/scss/**/*.scss', css);
    watch('./src/javascript/**/*.js', javascript);

}
