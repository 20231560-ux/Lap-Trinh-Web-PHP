document.addEventListener("DOMContentLoaded", function () {

  /* ===== TÌM KIẾM ===== */
  const searchForm = document.getElementById("searchForm");
  const searchInput = document.getElementById("searchInput");

  if (searchForm && searchInput) {
    searchForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const keyword = searchInput.value.trim();
      if (keyword) {
        window.location.href = "timkiem.html?q=" + encodeURIComponent(keyword);
      }
    });
  }

  /* ===== SLIDER TIN NỔI BẬT ===== */
  const slides = document.querySelector(".slides");
  const slideItems = document.querySelectorAll(".slide");
  const nextBtn = document.querySelector(".next");
  const prevBtn = document.querySelector(".prev");

  if (slides && slideItems.length > 0) {
    let index = 0;
    const total = slideItems.length;

    function showSlide(i) {
      slides.style.transform = `translateX(-${i * 100}%)`;
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        index = (index + 1) % total;
        showSlide(index);
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", () => {
        index = (index - 1 + total) % total;
        showSlide(index);
      });
    }

    // Tự động trượt
    setInterval(() => {
      index = (index + 1) % total;
      showSlide(index);
    }, 4000);
  }

});




const userBtn = document.querySelector(".user-btn");
const dropdown = document.querySelector(".dropdown-menu");

userBtn.addEventListener("click", function(e){
    e.stopPropagation();

    if(dropdown.style.display === "block"){
        dropdown.style.display = "none";
    }else{
        dropdown.style.display = "block";
    }
});

document.addEventListener("click", function(){
    dropdown.style.display = "none";
});