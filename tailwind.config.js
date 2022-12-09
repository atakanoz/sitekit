module.exports = {
  content: [
    './sources/**/*.{svg,css,png,jpg,js}',
    './includes/**/*.php',
    './views/**/*.php',
    './safelist.txt',

    // Theme root PHP files
    './404.php',
    './archive.php',
    './comments.php',
    './footer.php',
    './header.php',
    './index.php',
    './page.php',
    './search.php',
    './sidebar.php',
		'./single.php',
		'./front-page.php'
  ],
  theme: {
    plugins: []
  }
}
