import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                nun: ['Nunito', 'sans-serif'],
            },
            borderRadius: {
                extraLarge: '12rem'
            },
            backgroundColor: {
                'primary': '#F9FAFF',
                'secondary': '#262952',
                'action': '#9D8DF1',
            },
        },
    },

    plugins: [forms],
};
