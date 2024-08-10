/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        colors: {
            black : "#0A0808",
            white: "#F2F4FF",
            gold: "#E5C669",
        },
        fontFamily: {
            cormorant: ['Cormorant Upright', 'serif'],
            poppins: ['Poppins', 'sans-serif'],
            lato: ['Lato', 'sans-serif'],
        }
    },
  },
  plugins: [],
}

