/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js'
  ],
  theme: {
    extend: {
        fontFamily: {
            'inter': ['Inter', 'sans-serif'],
        },
        fontSize: {
            sm: 'clamp(0.7rem, 0.07vw + 0.69rem, 0.75rem)',
            base: 'clamp(0.88rem, 0.16vw + 0.84rem, 1rem)',
            lg: 'clamp(1.09rem, 0.31vw + 1.03rem, 1.33rem)',
            xl: 'clamp(1.37rem, 0.54vw + 1.26rem, 1.78rem)',
            '2xl': 'clamp(1.71rem, 0.87vw + 1.54rem, 2.37rem)',
            '3xl': 'clamp(2.14rem, 1.34vw + 1.87rem, 3.16rem)',
            '4xl': 'clamp(2.67rem, 2.02vw + 2.27rem, 4.21rem)',
            '5xl': 'clamp(3.34rem, 2.99vw + 2.74rem, 5.61rem)',
            '6xl': 'clamp(4.17rem, 4.35vw + 3.3rem, 7.48rem)',
            '7xl': 'clamp(5.22rem, 6.25vw + 3.96rem, 9.97rem)',
            '8xl': 'clamp(6.52rem, 8.91vw + 4.74rem, 13.29rem)',
            '9xl': 'clamp(8.15rem, 12.58vw + 5.63rem, 17.71rem)'
        }
    },
  },
  plugins: [],
}

