import preset from './vendor/filament/support/tailwind.config.preset'
import colors, { gray } from 'tailwindcss/colors'

export default {
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    presets: [preset],
    colors: {
        ...preset.colors,
        gray: colors.gray,
        slate: colors.slate,
        pink: colors.pink,
        red: colors.red,
        green: colors.green,
        blue: colors.blue,
    },
}
