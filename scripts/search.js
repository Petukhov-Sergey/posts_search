document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("search-form");
    const searchInput = document.getElementById("search-input");
    const searchResults = document.getElementById("search-results");
    searchForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const query = searchInput.value;
        if (query.length < 3) {
            alert("Введите минимум 3 символа для поиска.");
            return;
        }
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `ajax/search_handler.php?query=${encodeURIComponent(query)}`, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.length > 0) {
                    let output = "<h2>Результаты поиска:</h2>";
                    data.forEach(item => {
                        output += `<div>
                            <h3>${item.postTitle}</h3>
                            <p><strong>Комментарий:</strong> ${item.commentBody}</p>
                        </div>`;
                    });
                    searchResults.innerHTML = output;
                } else {
                    searchResults.innerHTML = "<p>Ничего не найдено.</p>";
                }
            }
        };
        xhr.send();
    });
});
