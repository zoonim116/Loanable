import.meta.glob([
  '../images/**',
  '../fonts/**',
]);


import './cookie.js';

function bottomBarInit() {
  const elementIsVisibleInViewport = (el) => {
    const { top, height } = el.getBoundingClientRect();
    return Math.abs(top) < height;
  };

  const bottomBar = document.querySelector('.bottom-bar');
  if (!bottomBar) {
    return;
  }
  if (elementIsVisibleInViewport(document.querySelector('header'))) {
    document.querySelector('.bottom-bar').classList.remove('active');
  } else {
    document.querySelector('.bottom-bar').classList.add('active');
  }
}

document.addEventListener('DOMContentLoaded', () => {
  document.querySelector('.mobile-menu_btn').addEventListener('click', () => {
    document.querySelector('body').classList.toggle('show-menu');
  });

  document.querySelectorAll('.faq-item_title').forEach((elem) => {
    elem.addEventListener('click', function () {
      this.parentNode.classList.toggle('active');
    });
  });

  bottomBarInit();
});

window.onscroll = function() {
  bottomBarInit();
};
