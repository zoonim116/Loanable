import.meta.glob([
  '../images/**',
  '../fonts/**',
]);


import './cookie.js';
import MicroModal from 'micromodal';

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

// function onClassChange(element, callback) {
//   const observer = new MutationObserver((mutations) => {
//     mutations.forEach((mutation) => {
//       if (
//         mutation.type === 'attributes' &&
//         mutation.attributeName === 'class'
//       ) {
//         callback(mutation.target);
//       }
//     });
//   });
//   observer.observe(element, { attributes: true });
//   return observer.disconnect;
// }

document.addEventListener('DOMContentLoaded', () => {
  // onClassChange(document.querySelector('[data-name="step_start-3_20"]'), (node) => {
  //     console.log(node);
  // });
  document.querySelector('.mobile-menu_btn').addEventListener('click', () => {
    document.querySelector('body').classList.toggle('show-menu');
  });

  document.querySelectorAll('.faq-item_title').forEach((elem) => {
    elem.addEventListener('click', function () {
      this.parentNode.classList.toggle('active');
    });
  });

  bottomBarInit();

  document.querySelectorAll('[href="#contact-form"]').forEach((elem) => {
    elem.addEventListener('click', function (e) {
      e.preventDefault();
      MicroModal.show('contact-form');
    });
  });

  // Validate Email and Phone Fields before submit form to avoid built-in FF validation
  jQuery('#fluentform_3 .ff-btn-submit').on('click', function(e) {
    e.preventDefault();
    jQuery.ajax({
      url: '/wp/wp-admin/admin-ajax.php',
      type: 'POST',
      data: {
        action: 'data_8_validate',
        email: jQuery('#ff_3_email').val(),
        phone: jQuery('.ff-el-phone').val(),
        form_id: jQuery('.frm-fluent-form').attr('data-form_id'),
      },
      beforeSend: function () {
        jQuery('.phone_container .error').remove();
        jQuery('.email_container .error').remove();
      },
      success: function( data ) {
        jQuery('#fluentform_3').submit();
      },
      error: function(data) {
        const errors = data.responseJSON.errors;
        const {phone, email} = errors;
        if (phone) {
          jQuery('.phone_container').addClass('ff-el-is-error');
          jQuery('.phone_container .ff-el-input--content').append('<div class="error text-danger" role="alert">'+phone+'</div>');
        }
        if (email) {
          jQuery('.email_container').addClass('ff-el-is-error');
          jQuery('.email_container .ff-el-input--content').append('<div class="error text-danger" role="alert">'+email+'</div>');
        }
      },
    });
  });
});

window.onscroll = function() {
  bottomBarInit();
};
