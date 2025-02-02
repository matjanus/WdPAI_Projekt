const galleryContainer = document.querySelector('.gallery-container');
const searchBar = document.querySelector('.search-bar');

let allGalleries = [];
async function fetchGalleries() {
    try {
        const response = await fetch('/api/galleries');
        if (!response.ok) {
            throw new Error('Błąd podczas pobierania galerii');
        }
        allGalleries = await response.json();
        renderGalleries(allGalleries);
    } catch (error) {
        console.error('Błąd:', error);
        galleryContainer.innerHTML = error;
    }
}

function renderGalleries(galleries) {
    galleryContainer.innerHTML = '';
    galleries.forEach(gallery => {
        const square = document.createElement('div');
        const imgBox = document.createElement('div');
        const title = document.createElement('p');

        if (gallery.img_path == null) {
            cover = document.createElement('i');
            cover.className = 'gallery-icon fa-solid fa-camera';
        } else {
            cover = document.createElement('img');
            cover.src = gallery.img_path;
            cover.className = 'gallery-image';
        }

        imgBox.className = 'gallery-image-box';
        square.className = 'gallery-box';
        title.textContent = gallery.name;

        square.dataset.name = gallery.name.toLowerCase();

        imgBox.appendChild(cover);
        square.appendChild(imgBox);
        square.appendChild(title);

        square.addEventListener('click', () => {
            window.location.href = "gallery/" + gallery.id;
        });

        galleryContainer.appendChild(square);
    });
}

function filterGalleries() {

    const searchText = searchBar.value.toLowerCase();
    const galleryBoxes = document.querySelectorAll('.gallery-box');
    galleryBoxes.forEach(box => {
        if (box.dataset.name.includes(searchText)) {
            box.style.display = '';
        } else {
            box.style.display = 'none';
        }
    });
}

searchBar.addEventListener('input', filterGalleries);
fetchGalleries();
