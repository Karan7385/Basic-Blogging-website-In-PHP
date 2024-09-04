function toggleMenu() {
    const nav = document.querySelector('.nav');
    nav.classList.toggle('show');
}

function toggleDropdown(event) {
    event.preventDefault();
    const dropdown = event.target.nextElementSibling;
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
}