const galleryContainer = document.querySelector('.gallery-container');

async function fetchGalleries() {
    try {
        const response = await fetch('/api/galleries');
        if (!response.ok) {
            throw new Error('Błąd podczas pobierania galerii');
        }
        const galleries = await response.json();
        renderGalleries(galleries);
    } catch (error) {
        console.error('Błąd:', error);
        galleryContainer.innerHTML = error;
    }
}

function renderGalleries(galleries) {
    galleryContainer.innerHTML = '';
    galleries.forEach(gallery => {
        const square = document.createElement('div');
        const title = document.createElement('p');

        if(galelry.img_path == null){
            cover = document.createElement('i');
            cover.className =  'gallery-image fa-solid fa-camera' 
        }else{
            cover = document.createElement('img');
            cover.src = galelry.img_path;
            cover.className = 'gallery-image';
        }
            
        square.className = 'gallery-box';
        title.textContent = gallery.name;

        square.appendChild(image);
        square.appendChild(title);
        square.addEventListener('click', () => {
            window.location.href = "gallery/" + gallery.id;
        });
        galleryContainer.appendChild(square);
    });
}

fetchGalleries();