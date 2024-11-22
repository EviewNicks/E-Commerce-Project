/** @type {import('tailwindcss').Config} */
const plugin = require("tailwindcss/plugin");

module.exports = {
  content: [
    "./src/**/*.{html,js}",
    "./public/**/*.html",
    "./src/**/*.{js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        playfair: ["Playfair", "serif"],
        poppins: ["Poppins", "sans-serif"],
        quicksand: ["Quicksand", "sans-serif"],
      },
      colors: {
        // Warna utama
        Primary: "#2c3e50",
        Secondary: "#e74c3c",
        Info: "#2f80ed",
        Success: "#27ae60",
        Warning: "#e2b93b",
        Error: "#eb5757",
        Third: "#ecf0f1",
        Ternary: "#95a5a6",

        // Lofi Colors
        "Lofi-Layer": {
          1: "#fff",
          2: "#f7f4f4",
          3: "#dbdbdb",
          4: "#c2c2c2",
          5: "#a6a5a5",
        },

        // Primary Layers
        "Primary-Colors": {
          1: "#5480a3",
          2: "#416788",
          3: "#35526f",
          4: "#2c3e50",
          5: "#1d2834",
        },
        "Primary-Layer": {
          1: "#eaeff4",
          2: "#cfdce8",
          3: "#a6bfd3",
          4: "#759cbb",
          5: "#5480a3",
        },

        // Secondary Layers
        "Secondary-Colors": {
          1: "#e74c3c",
          2: "#f38276",
          3: "#f9b0a8",
          4: "#fcd0cc",
          5: "#fef3f2",
        },

        // White Layers
        "White-Colors": {
          1: "#f0f3f3",
          2: "#e3e7e7",
          3: "#ccd5d5",
          4: "#acb9ba",
          5: "#95a5a6",
        },
      },
      backgroundImage: {
        // Gradien
        "grad-glass":
          "linear-gradient(225deg, rgba(255, 255, 255, 0.4) 0%, rgba(255, 255, 255, 0.05) 100%)",
        "grad-dark-glass":
          "linear-gradient(225deg, rgba(9, 44, 76, 0.4) 0%, rgba(9, 44, 76, 0.05) 100%)",
        "grad-green":
          "linear-gradient(225deg, rgba(87, 176, 120, 0.4) 0%, #c9e9d2 100%)",
        "grad-bluegrid":
          "linear-gradient(225deg, rgba(85, 112, 116, 0.4) 0%, #5480a3 100%)",
        "grad-primarygrid":
          'url("texture.jpg") 0px -11.254px / 100% 122.507% no-repeat, linear-gradient(225deg, #5480a3 0%, rgba(85, 112, 116, 0.4) 100%)',
        "grad-thirdgrid":
          "linear-gradient(225deg, #95a5a6 0%, rgba(149, 165, 166, 0.4) 100%)",
        "grad-pastel-blue":
          "linear-gradient(225deg, #d1e9f6 0%, rgba(209, 233, 246, 0.4) 100%)",
        "grad-pastel-pinky":
          "linear-gradient(225deg, #f1d3ce 0%, rgba(241, 211, 206, 0.4) 100%)",
        "grad-pastel-yellow":
          "linear-gradient(225deg, #f6eacb 0%, rgba(246, 234, 203, 0.4) 100%)",
        "grad-description":
          "linear-gradient(180deg, #e3e7e7 0%, #e3e7e7 77.67%, #acb9ba 100%)",
        "grad-primary": "linear-gradient(225deg, #416788 0%, #2c3e50 100%)",
      },
      boxShadow: {
        custom: "0px 4px 24px 0px rgba(0, 0, 0, 0.32)",
      },
      fontSize: {
        // Logo Styles
        "logo-large": [
          "64px",
          { lineHeight: "90px", fontWeight: "700", fontFamily: "Playfair" },
        ],
        "logo-medium": [
          "48px",
          { lineHeight: "68px", fontWeight: "600", fontFamily: "Playfair" },
        ],
        "logo-small": [
          "32px",
          { lineHeight: "44px", fontWeight: "500", fontFamily: "Playfair" },
        ],

        // Headline Styles
        "headline-large": [
          "48px",
          { lineHeight: "68px", fontWeight: "600", fontFamily: "Poppins" },
        ],
        "headline-medium": [
          "32px",
          { lineHeight: "44px", fontWeight: "600", fontFamily: "Poppins" },
        ],
        "headline-small": [
          "20px",
          { lineHeight: "28px", fontWeight: "600", fontFamily: "Poppins" },
        ],

        // Title Styles
        "title-large": [
          "24px",
          { lineHeight: "34px", fontWeight: "400", fontFamily: "Quicksand" },
        ],
        "title-medium": [
          "20px",
          {
            lineHeight: "28px",
            fontWeight: "500",
            fontFamily: "Quicksand",
            letterSpacing: "0.15px",
          },
        ],
        "title-small": [
          "16px",
          { lineHeight: "24px", fontWeight: "500", fontFamily: "Quicksand" },
        ],

        // Label Styles
        "label-large": [
          "20px",
          { lineHeight: "24px", fontWeight: "700", fontFamily: "Quicksand" },
        ],
        "label-medium": [
          "16px",
          {
            lineHeight: "20px",
            fontWeight: "700",
            fontFamily: "Quicksand",
            letterSpacing: "0.1px",
          },
        ],
        "label-small": [
          "14px",
          { lineHeight: "20px", fontWeight: "600", fontFamily: "Quicksand" },
        ],

        // Body Styles
        "body-large": [
          "14px",
          { lineHeight: "20px", fontWeight: "500", fontFamily: "Quicksand" },
        ],
        "body-medium": [
          "12px",
          { lineHeight: "16px", fontWeight: "500", fontFamily: "Quicksand" },
        ],
        "body-small": [
          "10px",
          { lineHeight: "14px", fontWeight: "500", fontFamily: "Quicksand" },
        ],
      },
    },
  },
  plugins: [
    plugin(function ({ addUtilities }) {
      addUtilities({
        ".backdrop-filter": {
          backdropFilter: "blur(2px)",
        },
      });
    }),
  ],
};
