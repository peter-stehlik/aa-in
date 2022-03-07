module.exports = {
    content: [
      './html/src/**/*.{html,js}',
    ],
    theme: {
      fontFamily: {
        sans: ["IBM Plex Sans", "Roboto", "Helvetica", "Arial", "sans-serif"],
      },
      extend: {
        colors: {
          primary: "#6846A0", // medium
          secondary: "#A06DC0", // light
          tertiary: "#361568", // dark
          quaternary: "#CCA0D7", // lighter
          green: "#82D2D2",
        },
      },
    },
    plugins: [
      ({ addComponents, theme }) => {
        addComponents({
          ".container": {
            /* padding: "0 1rem",
            margin: "0 auto", */
            width: "100%",
            // minHeight: "calc(100vh - 7rem)",
  
            // Breakpoints
            "@screen sm": {
              maxWidth: theme("screens.sm"),
            },
            "@screen md": {
              maxWidth: theme("screens.md"),
            },
            "@screen lg": {
              maxWidth: theme("screens.lg"),
            },
            "@screen xl": {
              maxWidth: "1160px",
            },
            "@screen 2xl": {
              maxWidth: "1160px",
            },
          },
        })
      },
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
    ],
  }
  