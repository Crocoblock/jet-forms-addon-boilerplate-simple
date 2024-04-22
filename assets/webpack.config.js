const WPExtractorPlugin = require(
	'@wordpress/dependency-extraction-webpack-plugin',
);
const path              = require( 'path' );
const devMode           = !process.argv.join( ':' ).
	includes( '--mode:production' );

module.exports = {
	context: path.resolve( __dirname, 'src' ),
	entry: {
		'editor': './editor/index.js',
	},
	output: {
		path: path.resolve( __dirname, 'build' ),
	},
	resolve: {
		extensions: [ '.js', '.jsx' ],
		alias: {
			'@': path.resolve( __dirname, 'src' ),
		},
	},
	module: {
		rules: [
			{
				test: /\.js(x)?$/,
				use: [
					'babel-loader',
				],
				exclude: /node_modules/,
			},
		],
	},
	plugins: [
		new WPExtractorPlugin(),
	],
	devtool: devMode ? 'inline-cheap-module-source-map' : false,
};
