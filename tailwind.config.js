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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                background: '#2d3748',
                textLight: '#e2e8f0',
                primary: '#3182ce',
                primaryHover: '#2b6cb0',
                danger: '#e53e3e',
                dangerHover: '#c53030',
            },
        },
    },

    plugins: [forms],
};
