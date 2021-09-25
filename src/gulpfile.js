/* package */
const { src, dest, watch, series, parallel } = require("gulp");
// const gulp = require("gulp");
const sass = require("gulp-sass");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const sassGlob = require("gulp-sass-glob");
const mmq = require("gulp-merge-media-queries");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssdeclsort = require("css-declaration-sorter");
const cleanCSS = require("gulp-clean-css");
const cssnext = require("postcss-cssnext");
const rename = require("gulp-rename");
const sourcemaps = require("gulp-sourcemaps");

const babel = require("gulp-babel");
const uglify = require("gulp-uglify");
const imageminSvgo = require("imagemin-svgo");
const browserSync = require("browser-sync");
const imagemin = require("gulp-imagemin");
const imageminMozjpeg = require("imagemin-mozjpeg");
const imageminPngquant = require("imagemin-pngquant");


// 読み込み先
const srcPath = {
	css: './sass/**/*.scss',
	js: './js/**/*.js',
	img: './images/**/*',
	ejs: './ejs/**/*.ejs'
}

// html反映用
const destPath = {
	all: '../dist/**/*',
	css: '../dist/css/',
	js: '../dist/js/',
	img: '../dist/images/',
	html: '../dist/',
}

// WordPress反映用
const themeName = "WordPressTheme"; // WordPress theme name
const destWpPath = {
	css: `../${themeName}/assets/css/`,
	js: `../${themeName}/assets/js/`,
	img: `../${themeName}/assets/images/`,
}

// 不要ファイルを削除
const del = require('del');
const delPath = {
	css: '../dist/css/',
	js: '../dist/js/script.js',
	jsMin: '../dist/js/script.min.js',
	img: '../dist/images/',
	html: '../dist/*.html',
	wpcss: `../${themeName}/assets/css/`,
	wpjs: `../${themeName}/assets/js/script.js`,
	wpjsMin: `../${themeName}/assets/js/script.min.js`,
	wpImg: `../${themeName}/assets/images/`,
}
const clean = (done) => {
	del(delPath.css, { force: true, });
	del(delPath.js, { force: true, });
	del(delPath.jsMin, { force: true, });
	del(delPath.img, { force: true, });
	del(delPath.html, { force: true, });
	del(delPath.wpcss, { force: true, });
	del(delPath.wpjs, { force: true, });
	del(delPath.wpjsMin, { force: true, });
	del(delPath.wpImg, {force: true,});
	done();
};

const cssSass = () => {
	return src(srcPath.css)
		.pipe(sourcemaps.init())
		.pipe(
			plumber({
				errorHandler: notify.onError('Error:<%= error.message %>')
			}))
		.pipe(sassGlob())
		.pipe(sass({ outputStyle: 'expanded' })) //指定できるキー expanded compressed
		.pipe(postcss([autoprefixer({ // autoprefixer
			grid: true
		})]))
		.pipe(postcss([cssdeclsort({ // sort
			order: "alphabetical"
		})]))
		.pipe(mmq()) // media query mapper
		.pipe(dest(destPath.css))
		.pipe(dest(destWpPath.css))
		.pipe(cleanCSS())
		.pipe(rename({ extname: '.min.css' }))
		.pipe(sourcemaps.write('./map'))
		.pipe(dest(destPath.css))
		.pipe(dest(destWpPath.css))
		.pipe(notify({
			message: 'Sassをコンパイルしました！',
			onLast: true
		}))
}


//  EJS
const ejs = require("gulp-ejs");
const replace = require("gulp-replace");
const htmlbeautify = require("gulp-html-beautify");

const srcEjsDir = "./ejs";

const ejsCompile = (done) => {
	src([srcEjsDir + "/**/*.ejs", "!" + srcEjsDir + "/**/_*.ejs"])
		.pipe(
			plumber({
				errorHandler: notify.onError(function (error) {
					return {
						message: "Error: <%= error.message %>",
						sound: false,
					};
				}),
			})
		)
		.pipe(ejs({}))
		.pipe(rename({ extname: ".html" }))
		.pipe(replace(/^[ \t]*\n/gim, ""))
		.pipe(
			htmlbeautify({
				indent_size: 2,
				indent_char: " ",
				max_preserve_newlines: 0,
				preserve_newlines: false,
				extra_liners: [],
			})
		)
		.pipe(dest(destPath.html));
	done();
};

// 画像圧縮

const imgImagemin = () => {
	return src(srcPath.img)

		.pipe(
			imagemin(
				[
					imageminMozjpeg({
						quality: 80
					}),
					imageminPngquant(),
					imageminSvgo({
						plugins: [
							{
								removeViewbox: false
							}
						]
					})
				],
				{
					verbose: true
				}
			)
		)
		.pipe(dest(destPath.img))
		.pipe(dest(destWpPath.img))
}

// js圧縮
const jsBabel = () => {
	return src(srcPath.js)
		.pipe(
			plumber(
				{
					errorHandler: notify.onError('Error: <%= error.message %>')
				}
			)
		)
		.pipe(babel({
			presets: ['@babel/preset-env']
		}))
		.pipe(dest(destPath.js))
		.pipe(dest(destWpPath.js))
		.pipe(uglify())
		.pipe(
			rename(
				{ extname: '.min.js' }
			)
		)
		.pipe(dest(destPath.js))
		.pipe(dest(destWpPath.js))
}

// ブラウザーシンク
const browserSyncOption = {
	server: "../dist/"
}
const browserSyncFunc = () => {
	browserSync.init(browserSyncOption);
}
const browserSyncReload = (done) => {
	browserSync.reload();
	done();
}


const watchFiles = () => {
	watch(srcPath.css, series(cssSass, browserSyncReload))
	watch(srcPath.js, series(jsBabel, browserSyncReload))
	watch(srcPath.img, series(imgImagemin, browserSyncReload))
	watch(srcPath.ejs, series(ejsCompile, browserSyncReload))

}
exports.default = series(series(clean, cssSass, jsBabel, imgImagemin, ejsCompile), parallel(watchFiles, browserSyncFunc));
