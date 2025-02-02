document.addEventListener("DOMContentLoaded", function () {
    const messageDiv = document.querySelector('.message');

    if (messageDiv) {
        setTimeout(() => {
            messageDiv.style.display = 'none';
        }, 3000); 
    }
});