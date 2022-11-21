/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        'light-dark':'#1E1E2D',
        'dark':'#161622',
        'neutral':'#F9F9F9',
        'white':'#F2F2F2',      
        'accent':"#5B5B6E"
      }
    },
    
  },
  plugins: [],
}
