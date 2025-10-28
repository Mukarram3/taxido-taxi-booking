const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const autoprefixer = require("autoprefixer");

module.exports = {
  mode: "development", // ✅ Added mode for correct behavior
  entry: "./public/assets/scss/style.scss",
  output: {
    path: path.resolve(__dirname, "assets/css"),
    filename: "style.bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [autoprefixer()],
              },
            },
          },
          "sass-loader",
        ],
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: "style.css",
    }),
    new BrowserSyncPlugin({
      files: ["template/user-app/index.blade.php"],
      host: "localhost",
      port: 3000,
      server: {
        baseDir: ["template/user-app", "./assets"],
        routes: {
          "/assets": "assets",
        },
      },
      injectChanges: true,
    }),
  ],
  watch: true, // Optional, only if you want Webpack to watch for changes continuously
};
