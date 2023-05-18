const themeSelect = document.getElementById('theme');

themeSelect.addEventListener('change', function() {
    const selectedOption = this.value;

    const oldTheme = document.querySelector('link[rel="stylesheet"]:not(#default):not([disabled])');
    if (oldTheme)
        oldTheme.disabled = true;

    if (selectedOption !== 'default') {
        const newTheme = document.getElementById(selectedOption);
        newTheme.disabled = false;
    }
});
