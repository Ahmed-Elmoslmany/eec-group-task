document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');
    const debounceDelay = 200; 
    let debounceTimeout;

    if (searchInput) {
        searchInput.focus(); 
        const value = searchInput.value; 
        searchInput.value = ''; 
        searchInput.value = value;
    }

    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            searchForm.submit();
        }, debounceDelay);
    });
});
