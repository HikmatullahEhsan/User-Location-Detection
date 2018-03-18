/*
* Gulp Tasks.
*/
var gulp = require("gulp");
var gutil = require("gulp-util");
var babel = require("gulp-babel");


gulp.task("babel", function (done) {
	return gulp.src("src/**/*.js")
		.pipe(babel({
			presets: ["babel-preset-es2015"]
		}).on("error", function (ex) {
			gutil.log(ex.message);
			console.log(ex.codeFrame);

			done();
		}))
		.pipe(gulp.dest("lib"));
});

gulp.task("watch", ["babel"], function () {
	gulp.watch("src/**/*.js",["babel"])
})


gulp.task("default", ["watch"]);