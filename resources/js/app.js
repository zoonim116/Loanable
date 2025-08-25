import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

document.addEventListener('DOMContentLoaded', () => {
  document.querySelector('.mobile-menu_btn').addEventListener('click', () => {
    document.querySelector('body').classList.toggle('show-menu');
  });

  document.querySelectorAll('.faq-item_title').forEach((elem) => {
    elem.addEventListener('click', function () {
      this.parentNode.classList.toggle('active');
    });
  })
});
