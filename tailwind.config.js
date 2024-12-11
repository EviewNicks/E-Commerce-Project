/** @type {import('tailwindcss').Config} */
const plugin = require("tailwindcss/plugin");

module.exports = {
  mode: "jit", // Aktifkan JIT mode
  content: [
    "./src/**/*.{html,js,php}", // Semua file di src
    "./public/**/*.{html,php,js}", // Semua file di public
    "./index.php", // File index.php di root
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

        grey: {
          0: "#E0E0E0",
          1: "#BDBDBD",
          2: "#828282",
          3: "#4F4F4F",
          4: "#333333",
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
        "grad-primarygrid": 'url("./assets/Texture/texture.jpg")',
        "grad-thirdgrid":
          "linear-gradient(225deg, #95a5a6 0%, rgba(149, 165, 166, 0.4) 100%)",
        "grad-pastel-blue":
          "linear-gradient(225deg, #d1e9f6 0%, rgba(209, 233, 246, 0.4) 100%)",
        "grad-pastel-glass":
          "linear-gradient(225deg, rgba(209, 233, 246, 0.80) 0%, rgba(209, 233, 246, 0.20) 100%))",
        "grad-pastel-pinky":
          "linear-gradient(225deg, #f1d3ce 0%, rgba(241, 211, 206, 0.4) 100%)",
        "grad-pastel-yellow":
          "linear-gradient(225deg, #f6eacb 0%, rgba(246, 234, 203, 0.4) 100%)",
        "grad-description":
          "linear-gradient(180deg, #e3e7e7 0%, #e3e7e7 77.67%, #acb9ba 100%)",
        "grad-primary": "linear-gradient(225deg, #416788 0%, #2c3e50 100%)",

        "img-login": "url('/public/Outfit/login-image.jpg')",
        "img-register": "url('/public/Outfit/outfit-4.jpg')",
        "img-headline": "url('/public/Outfit/Headline-Photos.png')",
      },
      boxShadow: {
        "shadow-product":
          "51px 159px 47px 0px rgba(0,0,0,0.01), 33px 102px 43px 0px rgba(0,0,0,0.04), 18px 57px 36px 0px rgba(0,0,0,0.15), 8px 25px 27px 0px rgba(0,0,0,0.26), 2px 6px 15px 0px rgba(0,0,0,0.29)",
        custom: "0px 4px 24px 0px rgba(0, 0, 0, 0.32)",
      },
      dropShadow: {
        "shadow-product":
          "51px 159px 47px rgba(0,0,0,0.01), 33px 102px 43px rgba(0,0,0,0.04), 18px 57px 36px rgba(0,0,0,0.15), 8px 25px 27px rgba(0,0,0,0.26), 2px 6px 15px rgba(0,0,0,0.29)",
        custom: "4px 4px 24px rgba(0, 0, 0, 0.32)",
      },
      fontSize: {
        // Logo Styles
        "logo-large": [
          "4rem", // 64px
          { lineHeight: "5.625rem", fontWeight: "700", fontFamily: "Playfair" }, // 90px
        ],
        "logo-medium": [
          "3rem", // 48px
          { lineHeight: "4.25rem", fontWeight: "600", fontFamily: "Playfair" }, // 68px
        ],
        "logo-small": [
          "2rem", // 32px
          { lineHeight: "2.75rem", fontWeight: "500", fontFamily: "Playfair" }, // 44px
        ],

        // Headline Styles
        "headline-large": [
          "3rem", // 48px
          { lineHeight: "4.25rem", fontWeight: "600", fontFamily: "Poppins" }, // 68px
        ],
        "headline-medium": [
          "2rem", // 32px
          { lineHeight: "2.75rem", fontWeight: "600", fontFamily: "Poppins" }, // 44px
        ],
        "headline-small": [
          "1.25rem", // 20px
          { lineHeight: "1.75rem", fontWeight: "600", fontFamily: "Poppins" }, // 28px
        ],

        // Title Styles
        "title-large": [
          "1.5rem", // 24px
          {
            lineHeight: "2.125rem",
            fontWeight: "400",
            fontFamily: "Quicksand",
          }, // 34px
        ],
        "title-medium": [
          "1.25rem", // 20px
          {
            lineHeight: "1.75rem",
            fontWeight: "500",
            fontFamily: "Quicksand",
            letterSpacing: "0.009375rem", // 0.15px
          },
        ],
        "title-small": [
          "1rem", // 16px
          { lineHeight: "1.5rem", fontWeight: "500", fontFamily: "Quicksand" }, // 24px
        ],

        // Label Styles
        "label-large": [
          "1.25rem", // 20px
          { lineHeight: "1.5rem", fontWeight: "700", fontFamily: "Quicksand" }, // 24px
        ],
        "label-medium": [
          "1rem", // 16px
          {
            lineHeight: "1.25rem",
            fontWeight: "700",
            fontFamily: "Quicksand",
            letterSpacing: "0.00625rem", // 0.1px
          },
        ],
        "label-small": [
          "0.875rem", // 14px
          { lineHeight: "1.25rem", fontWeight: "600", fontFamily: "Quicksand" }, // 20px
        ],

        // Body Styles
        "body-large": [
          "0.875rem", // 14px
          { lineHeight: "1.25rem", fontWeight: "500", fontFamily: "Quicksand" }, // 20px
        ],
        "body-medium": [
          "0.75rem", // 12px
          { lineHeight: "1rem", fontWeight: "500", fontFamily: "Quicksand" }, // 16px
        ],
        "body-small": [
          "0.625rem", // 10px
          {
            lineHeight: "0.875rem",
            fontWeight: "500",
            fontFamily: "Quicksand",
          }, // 14px
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
    require("flowbite/plugin"), // Tambahkan Flowbite di sini
    require("tailwind-scrollbar-hide"),
  ],
};
