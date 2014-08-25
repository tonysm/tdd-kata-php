var gulp = require("gulp");
var run = require("gulp-run");
var phpspec = require("gulp-phpspec");
var notify = require("gulp-notify");

gulp.task("test", function() {
    gulp.src("spec/**/*.php")
        .pipe(phpspec("", { 'verbose' : 'v', notify: true }))
        .on("error", notify.onError({
            title: "Crap",
            message: "Tests failing :(",
            icon: "software-update-urgent"
        }))
        .pipe(notify({
            title: "Success",
            message: "Tests passing :)",
            icon: "emblem-default"
        }));
});

gulp.task("watch", function() {
    gulp.watch(["spec/**/*.php", "src/**/*.php"], ["test"]);
});

gulp.task("default", ["test", "watch"]);