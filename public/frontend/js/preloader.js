function preloaderLoad() {
    var preloader = document.querySelector('.preloader');
  
  
    if (preloader) {
        setTimeout(function () {
            preloader.style.opacity = '0';
            setTimeout(function () {
                preloader.style.display = 'none';
            }, 300);
        }, 200);
    }
  
    var preloaderDisabler = document.querySelector(".preloader_disabler");
  
   
    if (preloaderDisabler) {
        preloaderDisabler.addEventListener('click', function () {
            var preloader = document.getElementById("preloader");
            preloader.style.display = 'none';
        });
    }
}
  
window.addEventListener('load', function () {
    preloaderLoad();
});