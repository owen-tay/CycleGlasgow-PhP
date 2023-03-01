/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{js,php}"],
  theme: {
    colors: {
      ereviveGreen: '#31c48d',
      ereviveGreen2: '#84e1bc',
      ereviveBrown: '#f4ead5',
      ereviveBrown2: '#e9dfcb',
    },

    
    extend: {},
    
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
