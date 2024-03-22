/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.php", "./login.php", "node_modules/preline/dist/*.js", "./node_modules/flowbite/**/*.js", "./admin/login.php", "./admin/logout.php", "./admin/index.php", "./admin/data-siswa.php"],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      screens: {
        "2xl": "1320px",
      },

      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
      },
    },
  },
  plugins: [require("rippleui"), require("preline/plugin"), require("daisyui"), require("flowbite/plugin")],
};
