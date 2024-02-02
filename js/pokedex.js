const elementsToFadeInUpOnScroll = document.querySelectorAll(".pokemon-card");
if (elementsToFadeInUpOnScroll) {
  window.addEventListener("scroll", function (event) {
    elementsToFadeInUpOnScroll.forEach(function (element) {
      if (window.scrollY >= element.offsetTop - window.innerHeight) {
        element.classList.add("show");
      } else {
        element.classList.add("hide");
        element.classList.remove("show");
      }
    });
  });
}

const topCard = document.querySelectorAll(".top-card");

topCard.forEach((card) => {
  const cardColor = card.nextElementSibling.getElementsByTagName("div")[1];
  const computedStyle = window.getComputedStyle(cardColor);
  var backgroundColor = computedStyle.backgroundColor;
  card.style.background = backgroundColor;
});
