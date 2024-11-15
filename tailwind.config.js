// tailwind.config.js
module.exports = {
  content: [
    "./index.php", // Memastikan Tailwind memindai file PHP di root
    "./src/**/*.{php,html,js}", // Memindai semua file PHP, HTML, dan JS di dalam src
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
