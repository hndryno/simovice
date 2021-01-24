const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.trueGray,
            indigo: colors.indigo,
            red: colors.rose,
            yellow: colors.amber,
            blue: colors.lightBlue,
            green: colors.lime,
            teal: colors.teal,
            pink: colors.pink,
            purple: colors.violet,
        }
    },

    variants: {
        extend: {
            opacity: ['disabled','group-focus'],
            width: ['responsive', 'hover', 'focus'],
            display: ['group-hover'],
            transform: ['group-hover'],
            rotate: ['group-hover'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
