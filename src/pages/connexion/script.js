function psswrdvisible() {
    var passwordInput = document.getElementById('password');
    var toggleButton = event.target;
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.src = './src/assets/icon/Eye.svg';
    } else {
        passwordInput.type = 'password';
        toggleButton.src = './src/assets/icon/Eye-off.svg';
    }
}