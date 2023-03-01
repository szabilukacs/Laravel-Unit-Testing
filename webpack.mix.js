/* eslint-disable no-undef */
const mix = require('laravel-mix')
const path = require('path')

require('laravel-mix-eslint')
require('laravel-mix-stylelint')


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    stats: {
        children: true,
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: 'sass-loader',
                        options: {
                            // prefer node-sass
                            implementation: require('node-sass'),
                        },
                    },
                    {
                        loader: 'sass-resources-loader',
                        options: {
                            resources: [
                                path.resolve(__dirname, 'resources/sass/globals.scss'),
                            ]
                        }
                    },
                ]
            }
        ]
    }
})

mix.js('resources/js/app.js', 'public/js')
    .eslint({
        fix: true,
        extensions: ['js', 'vue']
    })
    .stylelint({
        context: './resources',
        failOnError: true,
        files: ['**/*.scss', '**/*.vue'],
        fix: true,
        quiet: false,
    })
    .vue()
    .sass('resources/sass/app.scss', 'public/css')