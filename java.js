//Caroussel

var carousel = document.querySelector('.carousel-inner');
    var currentImageIndex = 0;
    var imageCount = carousel.childElementCount;
    var imageWidth = carousel.firstElementChild.clientWidth;
    var slideInterval = setInterval(nextImage, 5000); // Défilement automatique toutes les 1,5 seconde
    
    function previousImage() {
      clearInterval(slideInterval); // Arrêter le défilement automatique lors de la navigation manuelle
      if (currentImageIndex > 0) {
        currentImageIndex--;
        carousel.style.left = -currentImageIndex * imageWidth + 'px';
      }
    }
    
    function nextImage() {
      if (currentImageIndex < imageCount - 1) {
        currentImageIndex++;
        carousel.style.left = -currentImageIndex * imageWidth + 'px';
      } else {
        currentImageIndex = 0;
        carousel.style.left = 0;
      }
    }
  