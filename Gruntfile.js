'use strict';
module.exports = function(grunt) {
  // load all tasks
  require('load-grunt-tasks')(grunt);

  // show elapsed time
  require('time-grunt')(grunt);

  grunt.initConfig({
    sass: {
      dev: {
        options: {
          outputStyle: 'nested',
          sourceMap: false
        },
        files: {
          'assets/css/style.css': 'assets/scss/style.scss'
        }
      },
      build: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true
        },
        files: {
          'assets/css/style.min.css': 'assets/scss/style.scss'
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie >=8', 'android 2.3', 'android 4', 'opera 12']
      },
      dev: {
        src: 'assets/css/style.css'
      },
      build: {
        src: 'assets/css/style.min.css'
      }
    },
    watch: {
      sass: {
        files: [
          'assets/scss/**/**/*.scss'
        ],
        tasks: ['sass:dev']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/style.css',
          'page-templates/*.php',
          'templates/**/*.php',
          '*.php'
        ]
      }
    }
  });

  // Register tasks
  grunt.registerTask('dev', [
    'sass:dev'
  ]);
  grunt.registerTask('build', [
    'sass:build',
    'autoprefixer:build'
  ]);
};