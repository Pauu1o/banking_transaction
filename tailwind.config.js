/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                colorNav: "#0C0000",
                colarNavRed: "#C30000",
            },
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
};
