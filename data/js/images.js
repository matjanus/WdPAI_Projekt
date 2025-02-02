function showImage(src, id_image) {
    var modal = document.getElementById("imageModal");
    var modalImg = document.getElementById("fullImage");
    var coverImageInput = document.getElementById("coverImageId");

    modalImg.src = src;
    coverImageInput.value = id_image;

    modal.style.display = "flex";
}

function closeImage() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "none";
}