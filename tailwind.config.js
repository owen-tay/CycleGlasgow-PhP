/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.js',
    './**/*.php',
    './**/*.html',
  ],
  theme: {
    extend: {colors: {
      pink: {
        cycle: '#F796FF',

      },
      blue: {
        cycle: '#4ADDFF',

      },
    }},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
