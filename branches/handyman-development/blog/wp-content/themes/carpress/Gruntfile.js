module.exports = function (grunt) {
	// load all deps
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	// configuration
	grunt.initConfig({
		pgk: grunt.file.readJSON('package.json'),

		// https://npmjs.org/package/grunt-contrib-compass
		compass: {
			all: {
				options: {
					sassDir:        'assets/lib',
					cssDir:         'assets/stylesheets',
					imagesDir:      'assets/images',
					outputStyle:    'compact',
					relativeAssets: true,
					noLineComments: true,
					watch:          true
				}
			}
		},

		// Parse CSS and add vendor-prefixed CSS properties using the Can I Use database. Based on Autoprefixer.
		// https://github.com/nDmitry/grunt-autoprefixer
		autoprefixer: {
			dev: {
				files: [{
					expand: true,
					cwd:    'assets/stylesheets',
					src:    '*.css',
					dest:   'assets/stylesheets'
				}]
			}
		},

		// https://npmjs.org/package/grunt-contrib-watch
		watch: {
			options: {
				livereload: true,
				spawn:      false
			},

			// autoprefix the files
			autoprefixer: {
				files: ['assets/stylesheets/*.css'],
				tasks: ['autoprefixer:dev'],
			},

			// PHP files
			other: {
				files: ['**/*.php', 'assets/**/*.js'],
			},
		},

		// https://npmjs.org/package/grunt-concurrent
		concurrent: {
			server: [
				'compass',
				'watch'
			]
		},

		// https://npmjs.org/package/grunt-contrib-jshint
		jshint: {
			dist: {
				jshintrc: true,
				files: {
					src: ['assets/js/custom.js', 'Gruntfile.js']
				}
			}
		}
	});

	// when developing
	grunt.registerTask('server', [
		'concurrent:server'
	]);

	// linting
	grunt.registerTask('lint', ['jshint']);

	// defaults to the server
	grunt.registerTask('default', [
		'server'
	]);
};