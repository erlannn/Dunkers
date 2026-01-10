import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                typing: {
                    // 0% sampai 50%: Proses mengetik
                    // 50% sampai 80%: Berhenti sejenak (diam di 100% width)
                    // 80% sampai 100%: Menghapus teks kembali (opsional)
                    '0%': { width: '0' },
                    '50%': { width: '100%' }, 
                    '80%': { width: '100%' }, 
                    '100%': { width: '0' },
                },
                mengetik: {
                    // 0% sampai 50%: Proses mengetik
                    // 50% sampai 80%: Berhenti sejenak (diam di 100% width)
                    // 80% sampai 100%: Menghapus teks kembali (opsional)
                    '0%': { width: '0' },
                    '5%': { width: '5%' },
                    '50%': { width: '100%' }, 
                    '80%': { width: '100%' }, 
                    '100%': { width: '0' },
                },
                blink: {
                    '50%': { borderColor: 'transparent' },
                    '100%': { borderColor: 'inherit' },
                },
                marquee: {
                    '0%': { transform: 'translateX(100%)' },
                    '100%': { transform: 'translateX(-100%)' },
                  },
            },
            animation: {
                typing: 'typing 5s steps(30) infinite, blink .5s infinite',
                mengetik: 'mengetik 7s steps(30) infinite, blink .5s infinite',
                marquee: 'marquee 20s linear infinite',
            }
        },
    },

    plugins: [forms],
};