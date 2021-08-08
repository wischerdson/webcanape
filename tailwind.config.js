module.exports = {
	mode: 'jit',
	purge: [
		'./resources/css/**/*.(scss|css)',
		'./resources/views/**/*.(php|html)'
	],
	darkMode: false,
	theme: {
		extend: {
			spacing: {
				full: '100%'
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [],
}
