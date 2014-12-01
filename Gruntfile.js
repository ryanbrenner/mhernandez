module.exports = function(grunt) {

  // Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			build: {
				files: [{
					expand: true,
					cwd: 'wp-content/themes/marlahernandez/library/js',
					src: '*.js',
					dest: 'wp-content/themes/marlahernandez/library/js/build',
					ext: '.min.js'
				}]
			}
		},
		less: {
			development: {
				options: {
					compress: true
				},
				files: {
					"wp-content/themes/marlahernandez/library/css/style.css": "wp-content/themes/marlahernandez/library/less/style.less",
					"wp-content/themes/marlahernandez/library/css/ie.css": "wp-content/themes/marlahernandez/library/less/ie.less"
				}
			}
		},
		autoprefixer: {
			options: {
			 	browsers: ['last 2 version', 'ie 8', 'ie 9']
			},
			no_dest: {
			  src: 'wp-content/themes/marlahernandez/library/css/style.css' // globbing is also possible here
			},
	  	},
		watch: {
			css: {
				files: "wp-content/themes/marlahernandez/library/less/*.less",
				tasks: ['less', 'autoprefixer']
			},
			scripts: {
				files: "wp-content/themes/marlahernandez/library/js/*.js",
				tasks: ['uglify']	
			}
		}
	});

	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	// Default task(s).
	grunt.registerTask('default', ['uglify'], ['less'], ['autoprefixer'], ['watch']);

};