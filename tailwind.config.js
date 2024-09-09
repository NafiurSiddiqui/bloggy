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
                darkBlack: "#0F1311 ",
                lightWhite: "#ffff",
                darkPage: "#181B1A",
                lightPage: "#F1F9F5",
                logoColor: "#29F191 ",
                darkSectionHeader: "#8fbaa5",
                lightSectionHeader: "#676A68",
                darkText: {
                    100: "#dbffed",
                    200: "#c7f5d8",
                    300: "#c5edd4",
                },
                darkTextHover: {
                    100: "#e7fff3",
                    600: "#6de7aa",
                },
                lightText: "#38433E",
                lightTextHover: "#2a5c45",
                primaryBtnBg: "#14E785",
                darkLabel: "#54625D",
                darkLabelHover: "#35584c",
                darkToggleBtn: "#080A09",
                darkToggleSwitch: "#191D1B",
                darkDivider: "#1f2421",
                lightDivider: "#CDDED6",
                darkPostCard: "#1F2120",
                lightToggleBtn: "#E9E9E9",
                lightToggleSwitch: "#F8FFFD",
                lightNavFooter: "#F4F4F4",
            },
        },
    },
    darkMode: "selector",
    plugins: [forms],
};
