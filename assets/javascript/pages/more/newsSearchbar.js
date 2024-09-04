document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById('searchNews');
    const searchHint = document.querySelector('.search-hint');

    // Retrieve the JSON string and parse it
    const newsArrayJson = searchBar.getAttribute('data-news-var');
    let newsArray = [];

    try {
        newsArray = JSON.parse(newsArrayJson);
        if (searchBar) {
            searchBar.addEventListener('input', function () {
                const query = searchBar.value.toLowerCase();
                const filteredNews = newsArray.filter(news =>
                    news.headline.toLowerCase().includes(query) ||
                    news.shortDescription.toLowerCase().includes(query)
                );

                if (filteredNews.length != 0) {
                    let content = '';
                    filteredNews.forEach(news => {
                        content += `
                            <a href="#${news.id}"><div class="search-container" style="padding: 1rem;">
                                <div class="search-title">
                                    ${news.headline}
                                </div>
                                <div class="search-shortDescription">
                                    ${news.shortDescription}
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