const navSilide = () => {
  const burger = document.querySelector('.burger');
  const site_nav = document.querySelector('.site-nav');
  const overlay = document.querySelector('.nav-overlay');
  const nav = document.querySelector('.menu-primary-menu-links-container');
  const navLinks = document.querySelectorAll('.site-header nav ul li');



  burger.addEventListener('click', () => {
    //Toggle Nav
    nav.classList.toggle('nav-active');
    site_nav.classList.add('nav-open');

    //Animate links
    navLinks.forEach((link, index) => {

      if (link.style.animation) {
        link.style.animation = '';
      } else {
        link.style.animation = `navLinksFade 0.5s ease forwards ${index / 7 + 0.5}s`
      }
    });

    //burger animation
    burger.classList.toggle('toggle');

  });


}

navSilide();

