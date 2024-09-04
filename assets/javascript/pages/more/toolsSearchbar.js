document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById('search');
    const searchHint = document.querySelector('.search-hint');

    // Retrieve the JSON string and parse it
    const toolsArrayJson = searchBar.getAttribute('data-tools-var');
    let toolsArray = [];

    try {
        toolsArray = JSON.parse(toolsArrayJson);
        if (searchBar) {
            searchBar.addEventListener('input', function () {
                const query = searchBar.value.toLowerCase();
                const filteredTools = toolsArray.filter(tools =>
                    tools.toolName.toLowerCase().includes(query) ||
                    tools.shortDescription.toLowerCase().includes(query)
                );

                if (filteredTools.length != 0) {
                    let content = '';
                    filteredTools.forEach(tools => {
                        content += `
                                <a href="#${tools.id}"><div class="search-container" style="padding: 1rem;">
                                    <div class="search-title">
                                        ${tools.toolName}
                                    </div>
                                    <div class="search-shortDescription">
                                        ${tools.shortDescription}
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