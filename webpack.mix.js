const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const StyleLintPlugin = require('stylelint-webpack-plugin');

mix
	.setPublicPath('./public');

mix
	.sass(
		'resources/styles/main.scss',
		'styles.bundle.css',
		{ sassOptions: { outputStyle: 'compressed' } }
	)
	.options({
		postCss: [
			require('css-declaration-sorter')({
				order: 'smacss'
			})
		],
		autoprefixer: {
			options: {
				browsers: [
					'last 6 versions',
				]
			}
		}
	});

mix
	.combine([
		// 'resources/scripts/includes/*',
		'resources/scripts/main.js'
	],
		'public/scripts.bundle.js'
	);

mix
	.options({
		processCssUrls: false,
		postCss: [
			require('postcss-nested-ancestors'),
			require('postcss-nested'),
			require('postcss-import'),
			require('tailwindcss'),
			require('autoprefixer'),
		]
	});

mix
	.webpackConfig({
		plugins: [
			new CopyWebpackPlugin({
				patterns: [
					{ from: "resources/images", to: "images" },
					{ from: "resources/icons", to: "icons" },
					{ from: "resources/fonts", to: "fonts" },
				],
			}),
			new ImageminPlugin({
				test: /\.(jpe?g|png|jpg|gif|svg)$/i,
				plugins: [
					imageminMozjpeg({
						quality: 80,
					})
				]
			}),
			new StyleLintPlugin({
				files: './resources/styles/**/*.scss',
				configFile: './.stylelintrc'
			}),
		],
	});

mix
	.browserSync({
		proxy: 'http://localhost:8888',
		open: 'external',
		port: 3000,
		files: ['*.php', 'includes/**/*.php', 'views/**/*.php', 'resources/**/**/*']
	});

mix
	.disableNotifications();

mix
	.version();
