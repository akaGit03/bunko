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
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'custom-yellow': '#ffff5b',
            },
        },
        
        fontFamily: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            title: ['"Sawarabi Mincho"', 'sans-serif'],
            body: ['Robot', 'sans-serif'],
        },
    },

    plugins: [forms],
};
