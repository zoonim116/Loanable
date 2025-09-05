document.addEventListener("DOMContentLoaded", (event) => {
	function onClassChange(element, callback) {
	  const observer = new MutationObserver((mutations) => {
	    mutations.forEach((mutation) => {
	      if (
	        mutation.type === 'attributes' &&
	        mutation.attributeName === 'class'
	      ) {
	        callback(mutation.target);
	      }
	    });
	  });
	  observer.observe(element, { attributes: true });
	  return observer.disconnect;
	}

	var skipEnter = true;
	jQuery('.q-form.field-email input').on('keydown', function (event) {
	    if (skipEnter && (event.keyCode === 10 || event.keyCode === 13)) {
	        event.preventDefault();
	        return false;
	    }
	});

	var itemToWatch = document.querySelector('.q-form.field-email');
	var isValidEmail = false;
	// onClassChange(itemToWatch, (node) => {
	//   var emailError = document.querySelector('.q-form.field-email .f-invalid');
	//   // console.log(node.classList.contains('validate_8'));
	//   const val = document.querySelector('.q-form.field-email input').value;
	//   console.log(node.classList.contains('f-has-value'));
	//   if (node.classList.contains('f-has-value')) {
	//   	if (emailError === null && val.length > 0) {
	//   		debugger;
	//   		const form_id = jQuery('.frm-fluent-form').data('form_id');
	//   		// debugger;
	//   		jQuery.ajax({
	// 			url: window.ElementorProFrontendConfig.ajaxurl,
	// 			type: 'POST',
	// 			data: {
	// 				action: 'data_8_validate',
	// 				type: 'email',
	// 				value: val,
	// 				form_id: form_id
	// 			},
	// 			beforeSend: function () {

	// 			},
 	// 			success: function( data ) {
	// 				jQuery('.q-form.field-email .custom-error-alert').remove();
	// 				skipEnter = false;
	//   				document.querySelector('.q-form.field-email .ffc_question').nextSibling.style.setProperty("visibility", "visible", "important");
	// 			},
	// 			error: function(data) {
	// 				jQuery('.q-form.field-email .ff_conv_input .custom-error-alert').remove();
	// 				jQuery('.q-form.field-email .ff_conv_input .ffc_question').after('<div class="f-invalid custom-error-alert" role="alert" aria-live="assertive">'+data.responseJSON.errors.email+'</div>');
	// 				console.log('Error', data.responseJSON.errors.email);
	// 			},
	// 			complete: function() {
	// 				jQuery('.q-form.field-email').removeClass('validate_8');
	// 			}
	// 		});
	//   	} else {
	//   		skipEnter = true;
	//   		jQuery('.q-form.field-email .ff_conv_input .custom-error-alert').remove();
	//   	}
	//   }
	// });

  jQuery(document).on('click', '.prev_step', function() {
  	document.querySelector('.f-prev').click();
  });

  var current_step = 1;
  if (window.fluent_forms_global_var === undefined) {
  	return false;
  }
  var step_percent = 100 / window.fluent_forms_global_var.form.questions.length;
  var $_progressBarWrapper = jQuery('.ff-progress-bar');

  setInterval(function () {
  	// if (!itemToWatch.classList.contains('watching')) {
	//   	onClassChange(itemToWatch, (node) => {
	//   		node.classList.add('watching');
	//   		console.log("ASDASDASD");
	//   		console.log(jQuery('.q-form.field-email .valid_8'));
	//   		if (jQuery('.q-form.field-email .valid_8').length > 0) {
	//   			document.querySelector('.q-form.field-email .ffc_question').nextSibling.style.setProperty("visibility", "visible", "important");
	//   		}
	//   	});
	//  }

  	// console.log(jQuery('.q-form.f-fade-in-up.field-email input, .q-form.f-fade-in-down.field-email input').hasClass('valid_8'));
	if (jQuery('.q-form.f-fade-in-up.field-email input, .q-form.f-fade-in-down.field-email input').length > 0 && jQuery('.q-form.f-fade-in-up.field-email input, .q-form.f-fade-in-down.field-email input').hasClass('valid_8')) {
		document.querySelector('.q-form.field-email .ffc_question').nextSibling.style.setProperty("visibility", "visible", "important");
	}

  	if (jQuery('.f-enter .prev_step').length === 0) {
  		jQuery('.f-enter').prepend('<button class="o-btn-action prev_step" type="button" href="#" aria-label="Press to continue"><span class="graphic"><svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><line x1="216" y1="128" x2="40" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><polyline points="112 56 40 128 112 200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline></svg></span></button>');
  	}
  	// Check if step is changed
  	var currentQuestion = null;
  	if (jQuery('.q-form.f-fade-in-up .ffc_q_header .f-text, .q-form.f-fade-in-down .ffc_q_header .f-text').length > 0) {
  		currentQuestion = jQuery('.q-form.f-fade-in-up .ffc_q_header .f-text span:first-child, .q-form.f-fade-in-down .ffc_q_header .f-text span:first-child').text().replace('*', '');
  	}

  	var active_step = window.fluent_forms_global_var.form.questions.findIndex((q) => {
  		if (currentQuestion === null) {
  			return q.title === null;
  		} else {
  			return q.title?.includes(currentQuestion);
  		}

  	}) + 1;
  	if (active_step !== current_step) {
  		current_step = active_step;
			if (window.innerWidth < 1024 && active_step == 2) {
				var scrollProgressBar = document.querySelector('#form-container-wrapper').offsetTop - 10;
				window.scrollTo({ top: scrollProgressBar, behavior: 'smooth'});
			}
  		if ($_progressBarWrapper.length) {
		  	$_progressBarWrapper.width((step_percent * current_step) + '%');
		  }
  	}

  	 ////
	  var propertyInput = jQuery('.property input');
	  if (propertyInput.length > 0 && jQuery('.property-custom').length === 0) {
	  	  propertyInput.after('<div class="property-prefix">£</div><input type="text" class="property-custom" placeholder="'+propertyInput.attr('placeholder')+'"/>');
		  jQuery(document).on('keyup', '.property-custom', function(e) {
		  	var inp_value = jQuery('.property-custom').val();
		  	jQuery('.property input[type=number]').val(inp_value.replace(',', ''));
		  	document.querySelector('[name="property_value"]').dispatchEvent(new Event('change'));
		  });
		  jQuery('.property-custom').mask('000,000', { reverse: true });
	  }
	  ////


	  ///
	  var propertyInput = jQuery('.mortgage input');
	  if (propertyInput.length > 0 && jQuery('.mortgage-custom').length === 0) {
	  	  propertyInput.after('<div class="mortgage-prefix">£</div><input type="text" class="mortgage-custom" placeholder="'+propertyInput.attr('placeholder')+'"/>');
		  jQuery(document).on('keyup', '.mortgage-custom', function(e) {
		  	var inp_value = jQuery('.mortgage-custom').val();
		  	jQuery('.mortgage input[type=number]').val(inp_value.replace(',', ''));
		  	document.querySelector('[name="mortgage_balance"]').dispatchEvent(new Event('change'));
		  });
		  jQuery('.mortgage-custom').mask('000,000', { reverse: true });
	  }
	  ////


	  ///

	  var propertyInput = jQuery('.annual_income input');
	  if (propertyInput.length > 0 && jQuery('.annual_income-custom').length === 0) {
	  	  propertyInput.after('<div class="annual_income-prefix">£</div><input type="text" class="annual_income-custom" placeholder="'+propertyInput.attr('placeholder')+'"/>');
	  	  jQuery(document).on('keyup', '.annual_income-custom', function(e) {
		  	var inp_value = jQuery('.annual_income-custom').val();
		  	jQuery('.annual_income input[name=annual_income]').val(inp_value.replace(',', ''));
		  	document.querySelector('[name="annual_income"]').dispatchEvent(new Event('change'));
		 });
		  jQuery('.annual_income-custom').mask('000,000', { reverse: true });
	  }
	  ////
	  if (jQuery('[name="DOB"]').length > 0) {
	  	jQuery('[name="DOB"]').mask("00/00/0000");
	  }

	  jQuery('.field-multiplechoice .f-sub').each(function() {
	  	if (jQuery(this).find('.prev_step').length === 0) {
	  		jQuery(this).append('<button class="o-btn-action prev_step" type="button" href="#" aria-label="Press to continue"><span class="graphic"><svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><line x1="216" y1="128" x2="40" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><polyline points="112 56 40 128 112 200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline></svg></span></button>');
	  	}
	  })
  });


  if (jQuery('[name="Loan_term"]').length) {
  		jQuery('[name="Loan_term"]').after('<div class="years-prefix">years</div>')
  }

  var borrowInput = jQuery('.borrow input');
  borrowInput.after('<div class="borrow-prefix">£</div><input type="text" class="borrow-custom" placeholder="'+borrowInput.attr('placeholder')+'"/>');
  jQuery(document).on('keyup', '.borrow-custom', function(e) {
  	var inp_value = jQuery('.borrow-custom').val();
  	jQuery('.borrow input[type=number]').val(inp_value.replace(',', ''));
  	document.querySelector('[name="Loan_amount"]').dispatchEvent(new Event('change'));
  });

  jQuery('.borrow-custom').mask('000,000', { reverse: true });

  if ($_progressBarWrapper.length) {
  	$_progressBarWrapper.width(step_percent + '%');
  }
  var validateTimeout;
  // if (window.innerWidth < 1024) {
  	  jQuery(document).on('keyup', '.field-email input', function(e) {
  	  	document.querySelector('.q-form.field-email .f-enter')?.style.setProperty("visibility", "hidden", "important");
  	  	window.clearTimeout(validateTimeout);
  	  		validateTimeout = setTimeout(function() {
  	  			var emailValue = jQuery('.field-email input').val();
		  		var patt = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
	   			if (patt.test(emailValue) && jQuery('.q-form.field-email.is-validating').length === 0) {
	   				// const val = document.querySelector('.q-form.field-email input').value;
		  			const form_id = jQuery('.frm-fluent-form').data('form_id');
            jQuery.ajax({
              url: window.ElementorProFrontendConfig.ajaxurl,
              type: 'POST',
              data: {
                action: 'data_8_validate',
                type: 'email',
                value: emailValue,
                form_id: form_id
              },
              beforeSend: function () {
                jQuery('.q-form.field-email').addClass('is-validating');
                jQuery('.q-form.field-email input').removeClass('valid_8');
                jQuery('.q-form.field-email .ff_conv_input .ffc_question').after('<div class="validation_status">Email validation<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><style>.spinner_qM83{animation:spinner_8HQG 1.05s infinite}.spinner_oXPr{animation-delay:.1s}.spinner_ZTLf{animation-delay:.2s}@keyframes spinner_8HQG{0%,57.14%{animation-timing-function:cubic-bezier(0.33,.66,.66,1);transform:translate(0)}28.57%{animation-timing-function:cubic-bezier(0.33,0,.66,.33);transform:translateY(-6px)}100%{transform:translate(0)}}</style><circle class="spinner_qM83" cx="4" cy="12" r="3"/><circle class="spinner_qM83 spinner_oXPr" cx="12" cy="12" r="3"/><circle class="spinner_qM83 spinner_ZTLf" cx="20" cy="12" r="3"/></svg></div>');
              },
              success: function( data ) {
                jQuery('.q-form.field-email .custom-error-alert').remove();
                skipEnter = false;
                  document.querySelector('.q-form.field-email .f-enter')?.style.setProperty("visibility", "visible", "important");
                  jQuery('.q-form.field-email input').addClass('valid_8');
              },
              error: function(data) {
                jQuery('.q-form.field-email .ff_conv_input .custom-error-alert').remove();
                jQuery('.q-form.field-email .ff_conv_input .ffc_question').after('<div class="f-invalid custom-error-alert" role="alert" aria-live="assertive">'+data.responseJSON.errors.email+'</div>');
                jQuery('.q-form.field-email input').removeClass('valid_8');
                document.querySelector('.q-form.field-email .f-enter')?.style.setProperty("visibility", "hidden", "important");
                console.log('Error', data.responseJSON.errors.email);
              },
              complete: function() {
                jQuery('.q-form.field-email .ff_conv_input .validation_status').remove();
                jQuery('.q-form.field-email').removeClass('is-validating');
              }
            });
	   			}
  	  		}, 1000);
	  });
  // }


});
