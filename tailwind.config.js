/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            lineHeight: {
                'tight': 0.5,
            },
            width:{
                'half': '50%',
            }
        },
    },

    plugins: [],
}
