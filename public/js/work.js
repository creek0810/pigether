let slideIndex = 0;
let workImage;
function showImage() {
  // update image css to display
  workImage.forEach((el, idx) => {
      if(idx === slideIndex) {
          el.style.display = "block";
      } else {
          el.style.display = "none";
      }
  });
}
function init() {
    // get all work image and init UI
    workImage = [...document.getElementsByClassName("work-img")];
    showImage();
    // add event listener
    document.getElementById('next-img').addEventListener('click', function () { 
        console.log(workImage);
        slideIndex = (slideIndex + 1) % workImage.length;
        showImage();
    });
    document.getElementById('pre-img').addEventListener('click', function () { 
        slideIndex = (slideIndex - 1 + workImage.length) % workImage.length;
        showImage();
    });
}
//window.addEventListener('load', init);