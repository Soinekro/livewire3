import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                verde:{
                    100: '#47A084',
                    200: '#358F74',
                    300: '#247D63',
                    400: '#126C53',
                    500: '#025A42',
                    600: '#024F39',
                    700: '#024431',
                    800: '#023928',
                    900: '#005A42',
                }
            }
        },
        screens: {
            xs: "350px",
            ...defaultTheme.screens,
        },

    },

    plugins: [forms, typography],
};
