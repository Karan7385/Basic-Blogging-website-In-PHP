document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById('search');
    const searchHint = document.querySelector('.search-hint');

    // Retrieve the JSON string and parse it
    const blogsArrayJson = searchBar.getAttribute('data-blog-var');
    let blogsArray = [];

    try {
        blogsArray = JSON.parse(blogsArrayJson);
        if (searchBar) {
            searchBar.addEventListener('input', function () {
                const query = searchBar.value.toLowerCase();
                const filteredBlogs = blogsArray.filter(blog =>
                    blog.title.toLowerCase().includes(query) ||
                    blog.shortDescription.toLowerCase().includes(query)
                );

                if (filteredBlogs.length != 0) {
                    let content = '';
                    filteredBlogs.forEach(blog => {
                        content += `
                            <a href="#${blog.id}"><div class="search-container" style="padding: 1rem;">
                                <div class="search-title">
                                    ${blog.title}
                                </div>
                                <div class="search-shortDescription">
                                    ${blog.shortDescription}
                                </div>
                            </div></a>
                        `;
                    });

                    searchHint.style.display == 'none' ? (searchHint.style.display = 'block', searchHint.innerHTML = content) : searchHint.style.display = 'none';
                } else {
                    searchHint.style.display == 'none' ? (searchHint.style.display = 'block', searchHint.innerHTML = `<div style="text-align: center; font-size: 30px; font-style: italic; margin-top: 10rem;"><b>Search input data not found!</b></div>`) : searchHint.style.display = '';
                }
            });
        } else {
            console.error("Search input element not found!");
        }
    } catch (error) {
        console.error("Error parsing JSON:", error);
    }
});