/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./login.php",
    "node_modules/preline/dist/*.js",
    "./node_modules/flowbite/**/*.js",
    "./admin/login.php",
    "./admin/logout.php",
    "./admin/index.php",
    "./admin/data-siswa.php",
    "./akun.php",
    "./profil-akun.php",
    "./berita.php",
    "./admin/siswa.php",
    "./admin/account.php",
    "./guru/berita.php",
    "./admin/berita.php",
  ],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      screens: {
        "2xl": "1320px",
      },

      animation: {
        "loop-scroll": "loop-scroll 50s linear infinite",
      },

      keyframes: {
        "loop-scroll": {
          from: { transform: "translateX(0)" },
          to: { transform: "translateX(-100%)" },
        },
      },

      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
      },
    },
  },
  plugins: [require("rippleui"), require("daisyui"), require("flowbite/plugin")],
};
