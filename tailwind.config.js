/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
  theme: {
    extend: {
        colors: {
            black : "#0A0808",
            white: "#F2F4FF",
            gold: "#E5C669",
            gray: "#f2f4ff",
        },
        fontFamily: {
            cormorant: ['Cormorant Upright', 'serif'],
            poppins: ['Poppins', 'sans-serif'],
            lato: ['Lato', 'sans-serif'],
        },
        screens: {
            'mobile': { 'max': '639px' },
        },
    },
  },
  plugins: [],
}

