/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php", 
    'node_modules/preline/dist/*.js', 
    "./node_modules/flowbite/**/*.js",
    "./admin/login.php",
    "./admin/logout.php",
    "./admin/index.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [require("rippleui"), require('preline/plugin'), require("daisyui"), require('flowbite/plugin')],
};
