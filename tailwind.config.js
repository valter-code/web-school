/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php", 'node_modules/preline/dist/*.js'],
  theme: {
    extend: {},
  },
  plugins: [require("rippleui"), require("daisyui"), require('preline/plugin')],
}

