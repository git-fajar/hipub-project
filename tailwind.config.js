/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],
  plugins: [require("tw-elements/dist/plugin.cjs")],
  darkMode: "class",
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      colors: {
        back: '#E1F2F6',
        primary: '#00ccff',
        primaryhover: '#00A6CF',
        secondary: '#94a3b8',
        dark: '#111827',
        reds: '#dc2626',
        greens: '#16a34a',
        oranges: '#f97316',
        blues: '#2563eb',
      },
      screens: {
        '2xl': '1400px',
      },
    },
  },
  plugins: [],
}
