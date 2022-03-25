const path = require('path')
// const webpack = require('webpack')

module.exports = {
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
            '@': path.join(__dirname, './resources/js')
        }
    },
}
