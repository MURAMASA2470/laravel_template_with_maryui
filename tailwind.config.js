import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
     "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
  ],
  theme: {
    extend: {},
  },

  daisyui: {
    themes: [
        {
            light: {
                ...require("daisyui/src/theming/themes")["light"],
                primary: "#13599e",
            },
        },
        {
            dark: {
                ...require("daisyui/src/theming/themes")["dark"],
                primary: "#315196",
            },
            dark2: {
                colors: {
                    primary: {
                        50: "#f4f8fd",
                        100: "#e8f1fb",
                        200: "#c6ddf4",
                        300: "#a3c8ed",
                        400: "#5e9fe0",
                        500: "#1976d2",
                        600: "#176abd",
                        700: "#13599e",
                        800: "#0f477e",
                        900: "#0c3a67",
                    },
                    secondary: {
                        50: "#f4fbfa",
                        100: "#e9f6f5",
                        200: "#c9e9e6",
                        300: "#a8dbd7",
                        400: "#67c1b8",
                        500: "#26a69a",
                        600: "#22958b",
                        700: "#1d7d74",
                        800: "#17645c",
                        900: "#13514b",
                    },
                },
                primary: "#13599e", //700,
                "primary-focus": "#1976d2", //500
                "primary-content": "#f4f8fd", //50
                secondary: "#1d7d74", //700
                "secondary-focus": "#26a69a", //500
                "secondary-content": "#f4fbfa", //50
                accent: colors.fuchsia[700],
                "accent-focus": colors.fuchsia[500],
                "accent-content": colors.fuchsia[50],
                neutral: colors.neutral[100],
                "neutral-focus": colors.neutral[200],
                "neutral-content": colors.neutral[900],
                "base-100": colors.slate[900],
                "base-200": colors.slate[800],
                "base-300": colors.slate[700],
                "base-content": colors.slate[50],
                info: colors.sky[300],
                "info-content": colors.sky[900],
                success: colors.emerald[400],
                "success-content": colors.emerald[900],
                warning: colors.yellow[400],
                "warning-content": colors.yellow[900],
                error: colors.rose[300],
                "error-content": colors.rose[900],
            },
        },
        "emerald",
        "aqua",
        {
            winter: {
                ...require("daisyui/src/theming/themes")["winter"],
                primary: "#315196",
            },
        },
    ],
},
  plugins: [
    typography,
    forms,
    aspectRatio,
    require("daisyui")
  ],
}
