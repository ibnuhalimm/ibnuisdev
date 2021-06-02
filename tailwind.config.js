module.exports = {
    mode: 'jit',
    purge: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.{js,jsx,ts,tsx}',
    ],
    theme: {
        extend: {
            colors: {
                'ib-one': '#222831',
                'ib-two': '#393E46',
                'ib-three': '#00ADB5',
                'ib-four': '#F4F4F4',
            },
        },
    },
    variants: {},
    plugins: [],
};
