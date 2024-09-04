function blogSubmit(event) {
    event.preventDefault();

    let title = document.getElementById('title');
    let shortDescription = document.getElementById('shortDescription');
    let image = document.getElementById('image');
    let description = document.getElementById('description');

    validateField(title);
    validateField(shortDescription);
    validateField(image);
    validateField(description);
    
    if (title.value && shortDescription.value && image.value && description.value) {
        document.getElementById('blogForm').submit();
    }
}

document.getElementById('image').addEventListener('change', function() {
    let image = document.getElementById('image');
    let readonlyImage = document.getElementById('readonlyImage');
    readonlyImage.value = image.value.split('\\').pop();
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