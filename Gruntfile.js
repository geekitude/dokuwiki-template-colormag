module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({

        // Reference package.json
        pkg: grunt.file.readJSON('package.json'),

        postcss: {
            options: {
                map: false,
                processors: [
                    require('autoprefixer')({
                        overrideBrowserlist: ['last 2 versions']
                    }),
                    require('postcss-rtl')()
                ]
            },
            dist: {
                files: {
                    'css/colormag.less': ['css/src/colormag.less'],
                    'css/colormag.print.css': ['css/src/colormag.print.css']
                }
            }
        },
        watch: {
            css: {
                files: 'css/src/*.*',
                tasks: ['postcss'],
            }
        }
    });

    grunt.registerTask('default', ['watch']);
};