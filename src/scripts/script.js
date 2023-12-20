function psswrdvisible() {
    var passwordInput = document.getElementById('password');
    var toggleButton = event.target;
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.src = './src/assets/visible.png';
    } else {
        passwordInput.type = 'password';
        toggleButton.src = './src/assets/not-visible.png';
    }
}