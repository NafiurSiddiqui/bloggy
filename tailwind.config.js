import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                logo: ["Audiowide", "sans-serif"],
            },
            colors: {
                darkNavFooter: "#0F1311 ",
                darkPage: "#181B1A",
                logoColor: "#29F191 ",
                sectionHeader: "#A0A9B4",
                darkLabel: "#54625D",
                darkToggleBtn: "#080A09",
                darkToggleSwitch: "#191D1B",
                lightToggleBtn: "#E9E9E9",
                lightToggleSwitch: "#F8FFFD",
                lightNavFooter: "#F4F4F4",
            },
        },
    },
    darkMode: "selector",
    plugins: [forms],
};
