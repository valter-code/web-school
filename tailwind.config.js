/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php", 'node_modules/preline/dist/*.js', "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {},
  },
  plugins: [require("rippleui"), require('preline/plugin'), require("daisyui"), require('flowbite/plugin')],
};
