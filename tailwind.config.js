/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        primary: "#9333EA",
        secondary: "#ff7e33",
        info: "#0C63E7",
      }
    },
  },
  plugins: [],
}