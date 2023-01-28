const { series, parallel, task, src, dest, watch } = require("gulp");
const rm = require("gulp-rm");
const sass = require("gulp-sass")(require("sass"));
const concat = require("gulp-concat");
const cleanCss = require("gulp-clean-css");
const gulpIf = require("gulp-if");
const sourcemaps = require("gulp-sourcemaps");
const autoprefixer = require("gulp-autoprefixer");
const gcmq = require("gulp-group-css-media-queries");
const rename = require("gulp-rename");
const babel = require("gulp-babel");
const terser = require("gulp-terser");
const webp = require("gulp-webp");
const env = process.env.NODE_ENV;
const { CONFIG } = require("./gulpconfig.js");

console.log(CONFIG);

CONFIG.forEach((elem) => {
    task("scss"+elem, () => {
        return src(
            "www/wp-content/themes/"+elem+"/assets/scss/main.scss"
        )
            .pipe(gulpIf(env === "dev", sourcemaps.init()))
            .pipe(concat("main.scss"))
            .pipe(sass().on("error", sass.logError))
            .pipe(dest("www/wp-content/themes/"+elem+"/assets/style/"));
    });

    task("media-scss"+elem, () => {
        return src(
            "www/wp-content/themes/"+elem+"/assets/scss/media.scss"
        )
            .pipe(gulpIf(env === "dev", sourcemaps.init()))
            .pipe(concat("media.scss"))
            .pipe(sass().on("error", sass.logError))
            .pipe(dest("www/wp-content/themes/"+elem+"/assets/style/"));
    });

    task("watch-main"+elem, function () {
        watch(
            "www/wp-content/themes/"+elem+"/assets/scss/main.scss",
            parallel("scss"+elem),
        );
    });

    task("watch-media"+elem, function () {
        watch(
            "www/wp-content/themes/"+elem+"/assets/scss/media.scss",
            parallel("media-scss"+elem),
        );
    });


});

CONFIG.forEach((elem) => {
    task(
        "default",
        parallel(
            "watch-main"+elem,
            "watch-media"+elem,
            series("scss"+elem),
            series("media-scss"+elem),
        )
    );
});


