const toggleButtons = document.querySelectorAll('.toggle-btn');

toggleButtons.forEach(button => {
    button.addEventListener('click', () => {
        e.preventDefault(); 
        button.classList.toggle('active');
    });
});
