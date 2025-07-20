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
        navy: '#0A192F',
        charcoal: '#2D3748',
        offwhite: '#F8F9FA',
        electric: '#3B82F6',
        lightgray: '#E2E8F0',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
