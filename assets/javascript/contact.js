(function() {
    emailjs.init("k9jSS6MvG5j0lUa2q");
})();

function sendMail() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let message = document.getElementById('message').value;
    let msg = document.getElementById('msg');

    var templateParams = {
        to_name: name,
        from_name: email,
        message: message
    };

    if(name && email && message) {
        emailjs.send('service_mcyy9t9', 'template_ocvxu8d', templateParams)
        .then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
            msg.innerHTML = "Email sent successfully!";
            msg.style.color = 'green';
        }, function(error) {
            console.error('FAILED...', error);
            msg.innerHTML = "Failed to send email.";
            msg.style.color = 'red';
        });
    } else {
        msg.innerHTML = "Please fill all details *";
        msg.style.color = 'red';
        msg.style.marginTop = '1rem';
    }
}