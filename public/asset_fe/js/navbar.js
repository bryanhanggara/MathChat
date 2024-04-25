
let prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;

  if (prevScrollpos > currentScrollPos ) {
    document.querySelector(".navbar-t").style.top = "-100px"; /* Munculkan navbar saat scroll ke atas */
  } else {
    document.querySelector(".navbar-t").style.top = "0px"; /* Sembunyikan navbar saat scroll ke bawah */
  }
  const navbar = document.querySelector(".navbar-b");

  // Memeriksa apakah scroll berada di bagian atas halaman
  const isTop = currentScrollPos === 0;

  if (prevScrollpos > currentScrollPos || isTop) {
    navbar.style.top = "0"; /* Munculkan navbar saat scroll ke atas atau di bagian atas halaman */
  } else {
    navbar.style.top = "-100px"; /* Sembunyikan navbar saat scroll ke bawah */
  }
  prevScrollpos = currentScrollPos;
};