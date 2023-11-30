/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**'],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: ["light", "dark", "cupcake", "halloween"],
  }
}

