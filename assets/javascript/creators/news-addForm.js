function newsSubmit(event) {
    event.preventDefault();

    let headline = document.getElementById('headline');
    let shortDescription = document.getElementById('shortDescription');
    let image = document.getElementById('image');
    let news = document.getElementById('news');

    validateField(headline);
    validateField(shortDescription);
    validateField(image);
    validateField(news);
    
    
    if (headline.value && shortDescription.value && image.value && news.value) {
        document.getElementById('newsForm').submit();
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