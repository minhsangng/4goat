window.onscroll = scrolltotop;
window.onload = scrolltotop;

function scrolltotop() {
  let button = document.getElementById("scrolltotop");

  if (document.documentElement.scrollTop > 100) button.style.display = "block";
  else button.style.display = "none";

  button.addEventListener("click", () => {
    let scrollInterval = setInterval(() => {
      let currentPosition =
        document.documentElement.scrollTop || document.body.scrollTop;

      if (currentPosition <= 0) {
        clearInterval(scrollInterval);
      } else {
        window.scrollBy(0, -10);
      }
    }, 70);
  });
}
