import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.faq-item_title').forEach((elem) => {
    elem.addEventListener('click', function () {
      this.parentNode.classList.toggle('active');
    });
  })
});
