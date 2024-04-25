const articles = document.querySelectorAll('article');

// Loop melalui setiap artikel kecuali yang terakhir
for (let i = 0; i < articles.length - 1; i++) {
    // Buat elemen <hr>
    const hrElement = document.createElement('hr');
    // Sisipkan elemen <hr> setelah artikel saat ini
    articles[i].parentNode.insertBefore(hrElement, articles[i].nextSibling);
}

// Ambil semua elemen ikon hati
const heartIcons = document.querySelectorAll('.heart-icon');
const bookmarkIcons = document.querySelectorAll('.bookmark-icon');

// Tambahkan event listener untuk setiap ikon hati
heartIcons.forEach(heartIcon => {
    heartIcon.addEventListener('click', function () {
        toggleIconClass(heartIcon, 'bi-heart', 'bi-heart-fill');
    });
});

// Tambahkan event listener untuk setiap ikon bookmark
bookmarkIcons.forEach(bookmarkIcon => {
    bookmarkIcon.addEventListener('click', function () {
        toggleIconClass(bookmarkIcon, 'bi-bookmark', 'bi-bookmark-fill');
    });
});

// Fungsi untuk toggle kelas ikon
function toggleIconClass(icon, initialClass, toggledClass) {
    if (icon.classList.contains(initialClass)) {
        icon.classList.remove(initialClass);
        icon.classList.add(toggledClass);
    } else {
        icon.classList.remove(toggledClass);
        icon.classList.add(initialClass);
    }
}





