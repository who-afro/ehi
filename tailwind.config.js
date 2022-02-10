const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto'],
            },
            colors: {
                'iaho': {
                    'dark-blue': '#244c7d',
                    'deep-blue': '#001333',
                    'light-blue': '#1e7fb8',
                    'polio-orange': '#F7971C',
                    'green': '#00b49b',
                    'yellow': '#ffc337',
                    'red': '#e61e64',
                    'light-gray': '#F2F5FA',
                    'dim': '#404E66',
                    'background': '#F7FBFF',
                    'map-background': '#F0F7FF',
                    'map-country-background': '#E0EFFF',
                    'map-country-border': '#8FA7BF'
                }
            },
            listStyleType: {
                roman: 'lower-roman'
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
