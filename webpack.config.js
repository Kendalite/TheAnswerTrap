var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './public/assets/app.js')
    .enableSingleRuntimeChunk()
    .enableSassLoader()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction());

module.exports = Encore.getWebpackConfig();