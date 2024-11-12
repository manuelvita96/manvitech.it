// Webpack uses this to work with directories
const precss = require('precss');
const autoprefixer = require('autoprefixer');
const path = require('path');
const CompressionPlugin = require('compression-webpack-plugin');
// const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
var WebpackObfuscator = require('webpack-obfuscator');
const TerserPlugin = require('terser-webpack-plugin');

const MiniCssExtractPlugin = require('mini-css-extract-plugin'); // extract css to files
const tailwindcss = require('tailwindcss');
const SpeedMeasurePlugin = require('speed-measure-webpack-plugin');

// const smp = new SpeedMeasurePlugin();

// This is the main configuration object.
const config = {
	// Path to your entry point. From this file Webpack will begin its work
	entry: {
		index: './dev/builder/index.js'
		// e1: './dev/builder/reducers/headerSlice.js'
		// foo: './dev/modules/foo.js'
	},

	// Path and filename of your result bundle.
	// Webpack will bundle all JavaScript into this file
	output: {
		path: path.resolve(__dirname, 'dist/options'),
		// publicPath: '',
		clean: true, // Clean the output directory before emit.
		filename: '[name].bundle-6.js',
        globalObject: 'window',
		chunkFilename: '[name].[chunkhash].js'
	},

	plugins: [
		// new CompressionPlugin({}),
		new WebpackObfuscator(
			{
				// compact: false,
				// splitStrings: false,
				// rotateStringArray: false,
				// identifierNamesGenerator: 'mangled-shuffled',
				// stringArrayWrappersChainedCalls: false,
				// stringArrayEncoding: ['none'],

				// deadCodeInjection: true,
				// deadCodeInjectionThreshold: 0.2,
				// splitStrings: true,
				// rotateStringArray: true,
				debugProtection: true,
				selfDefending: true,
				debugProtectionInterval: 4000,
				// splitStringsChunkLength: 2,

				deadCodeInjection: false

				// ========================

				// disableConsoleOutput: true,
				// transformObjectKeys: true,

				// stringArrayCallsTransform: true, Failed
				// stringArrayWrappersType: 'function', Failed

				// deadCodeInjection: true,
				// splitStrings: true,
				// splitStringsChunkLength: 2,
				// rotateStringArray: true,
				// stringArray: true,
				// debugProtection: true,
				// stringArrayCallsTransform: true,
				// selfDefending: true,
				// stringArrayEncoding: ['rc4'],
				// transformObjectKeys: true,

				// compact: true,
				// // controlFlowFlattening: true,
				// // controlFlowFlatteningThreshold: 0.75,
				// deadCodeInjection: true,
				// deadCodeInjectionThreshold: 0.2,
				// debugProtection: true,
				// debugProtectionInterval: 4000,
				// disableConsoleOutput: true,
				// identifierNamesGenerator: 'hexadecimal',
				// log: false,
				// numbersToExpressions: true,
				// // renameGlobals: false,
				// selfDefending: true,
				// simplify: true,
				// splitStrings: true,
				// splitStringsChunkLength: 2,
				// stringArray: true,
				// stringArrayCallsTransform: true,
				// stringArrayEncoding: ['rc4'],
				// // stringArrayIndexShift: true,
				// // stringArrayRotate: true,
				// // stringArrayShuffle: true,
				// // stringArrayWrappersCount: 1,
				// // stringArrayWrappersChainedCalls: true,
				// // stringArrayWrappersParametersMaxCount: 2,
				// stringArrayWrappersType: 'function',
				// // stringArrayThreshold: 1,
				// transformObjectKeys: true
				// // unicodeEscapeSequence: false
			},
			// ['166.js', '539.js', '565.js']
			['**/*.js', '!**/index.bundle*']
		)
	],
	// optimization: {
	//   minimizer: [
	//     new UglifyJsPlugin({
	//       test: /\.js(\?.*)?$/i,
	//     }),
	//   ],
	// },

	optimization: {
		// runtimeChunk: 'single',
		minimizer: [
			new TerserPlugin({
				terserOptions: {
					format: {
						comments: false // Remove all comments
					}
				},
				extractComments: false
			})
		],
		// splitChunks: {
		//     chunks: 'all', // Split both dynamically and statically imported modules
		//     // cacheGroups: {
		//     //   vendor: {
		//     //     test: /[\\/]node_modules[\\/]/,
		//     //     name: 'vendors',
		//     //     chunks: 'all',
		//     //   },
		//     // },
		// },
		// runtimeChunk: 'single',
		// runtimeChunk: {
		// 	name: (entrypoint) => `runtime.${entrypoint.name}`,
		//   },
		splitChunks: {
			chunks: 'all',
			maxInitialRequests: Infinity,
			minSize: 0,
			cacheGroups: {
				vendor: {
					test: /[\\/]node_modules[\\/]/,
					name: 'vendors',
					enforce: true,
					chunks: 'all'
				}
			}
		}
	},

	module: {
		rules: [
			{
				use: 'babel-loader',
				test: /\.js$/,
				exclude: /node_modules/
			},
			// {
			//   use: ['style-loader', 'css-loader'],
			//   test: /\.css$/
			// },
			{
				test: /\.(css)$/,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					{
						loader: 'postcss-loader', // postcss loader needed for tailwindcss
						options: {
							postcssOptions: {
								ident: 'postcss',
								plugins: [tailwindcss, autoprefixer]
							}
						}
					}
				]
			},
			// {
			//     test: /\.svg$/,
			//     use: [
			//         {
			//             loader: 'file-loader',
			//             options: {
			//                 limit: 10000
			//             }
			//         }
			//     ]
			// },
			{
				test: /\.svg$/,
				include: [path.resolve(__dirname, './dev/builder/assets/icons/'), path.resolve(__dirname, './dev/builder/assets/svg/')],
				use: [
					{
						loader: '@svgr/webpack',
						options: {
							svgo: false
						}
					}
				]
			},
			{
				test: /\.svg$/,
				exclude: [path.resolve(__dirname, './dev/builder/assets/icons/'), path.resolve(__dirname, './dev/builder/assets/svg/')],
				use: [
					{
						loader: 'svg-url-loader',
						options: {
							limit: 10000
						}
					}
				]
			},
			{
				test: /\.(png|jpg|gif|riv|webp)$/,
				use: ['file-loader']
			},
			{
				test: /\.(scss)$/,
				// use: [{
				//   loader: 'style-loader' // inject CSS to page
				// }, {
				//   loader: 'css-loader' // translates CSS into CommonJS modules
				// },
				// // {
				// //   loader: 'postcss-loader', // Run post css actions
				// //   options: {
				// //     postcssOptions: {
				// //       plugins: [
				// //         [
				// //           "precss"
				// //         ],
				// //         [
				// //           "autoprefixer"
				// //         ],
				// //       ],
				// //     },
				// //   },

				// // },
				// {
				//   loader: 'sass-loader' // compiles Sass to CSS
				// }]
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					'sass-loader',
					{
						loader: 'postcss-loader', // postcss loader needed for tailwindcss
						options: {
							postcssOptions: {
								ident: 'postcss',
								plugins: [tailwindcss, autoprefixer]
							}
						}
					}
				]
			},
			{
				test: /\.(woff|woff2|ttf|eot)$/,
				use: 'file-loader?name=fonts/[name].[ext]!static'
			}
		]
	},
	// Default mode for Webpack is production.
	// Depending on mode Webpack will apply different things
	// on the final bundle. For now, we don't need production's JavaScript
	// minifying and other things, so let's set mode to development
	// mode: 'production'
	mode: 'production'
};

// Here, you write different options and tell Webpack what to do
// module.exports = smp.wrap();
const configWithTimeMeasures = new SpeedMeasurePlugin().wrap(config);
configWithTimeMeasures.plugins.push(new MiniCssExtractPlugin({}));
module.exports = configWithTimeMeasures;
