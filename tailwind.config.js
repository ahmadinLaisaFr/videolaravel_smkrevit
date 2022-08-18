/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                ungu: "#5267DF",
                merah: "#FA5959",
                biru: "#242A45",
                "abu-abu": "#9194A2",
                putih: "#F7F7F7",
            },
            fontFamily: {
                Poppins: ["Poppins, sans-serif"],
            },
            container: {
                center: true,
                padding: "1rem",
                screens: {
                    lg: "1124px",
                    xl: "1124px",
                    "2xl": "1124px",
                },
            },
        },
    },
    plugins: [],
};
