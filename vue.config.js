module.exports = {
  productionSourceMap: false,
  configureWebpack: {
    optimization: {
      splitChunks: {
        chunks: 'all'
      }
    }
  },
  outputDir: 'dist',
  publicPath: '/your-domain-name/'
}