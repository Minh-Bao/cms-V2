// tailwind.config.js
const plugin = require('tailwindcss/plugin')

const colors = require('tailwindcss/colors')

const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
                frontsite: ['Avenir'],
            },
            colors: {
                mainText: ['#5a5a5a;'],
                pinkNC: ['#ce4963;'],
                pink: {
                    450: '#ce4963'
                  },
                white:{
                    450: '#f2f2f2'
                },
                cyan: colors.cyan,
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require( '@tailwindcss/ui'),
        require( '@tailwindcss/aspect-ratio'),
        require('tailwindcss-textshadow'),
        require('@tailwindcss/forms'),
    ],
    important: true,
  }
  