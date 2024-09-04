function tutorialsSubmit(event) {
    event.preventDefault();

    let title = document.getElementById('title');
    let shortDescription = document.getElementById('shortDescription');
    let video = document.getElementById('video');

    validateField(title);
    validateField(shortDescription);
    validateField(video);
    
    if (title.value && shortDescription.value && video.value) {
        document.getElementById('tutorialsForm').submit();
    }
}

document.getElementById('video').addEventListener('change', function() {
    let video = document.getElementById('video');
    let readonlyVideo = document.getElementById('readonlyVideo');
    readonlyVideo.value = video.value.split('\\').pop();
});

function validateField(field) {
    let errorElement = document.getElementById(field.id + 'Error');
    if (field.value === '' || field.value === null) {
        field.style.borderColor = 'red';
        errorElement.style.display = 'block';
    } else {
        field.style.borderColor = '';
        errorElement.style.display = 'none';
    }
}