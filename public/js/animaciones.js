document.querySelectorAll('.logo-social').forEach(logo => {
    logo.addEventListener('mouseover', () => {
        logo.querySelector('img').style.transform = 'rotate(360deg) scale(1.2)';
    });

    logo.addEventListener('mouseout', () => {
        logo.querySelector('img').style.transform = 'rotate(0deg) scale(1)';
    });
});
