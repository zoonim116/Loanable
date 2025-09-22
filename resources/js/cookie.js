function getParameterByName(name) {
    var url = window.location.href;
	const params = new URL(url).searchParams;
    console.log('Current URL:', url);
	console.log('Search params:', params);
	return params.get(name);
}


function setCookie(name, value) {
    var date = new Date();
    date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000)); // 30 days
    var expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + value + expires + "; path=/";
    console.log('Cookie set:', name + '=' + value);
}

// Updated parameters list to include FBCLID and MSCLKID
var parameters = ['cid', 'k', 'c', 'gclid', 'fbclid', 'msclkid', 'source', 'medium', 'kw', 'content', 'cv'];

console.log('Starting parameter check...');
// Store parameters in cookies
parameters.forEach((param) => {
	var value = getParameterByName(param);
    if (value) {
        setCookie('wp_' + param, value);
    }
});
console.log('All current cookies:', document.cookie);


function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}


// Second script (Form Population) modifications:
function findField(form, fieldName) {
    // Generate all possible case variations
    var variations = [
        fieldName,
        fieldName.toLowerCase(),
        fieldName.toUpperCase(),
        fieldName.charAt(0).toUpperCase() + fieldName.slice(1).toLowerCase(),
        fieldName.charAt(0).toLowerCase() + fieldName.slice(1).toUpperCase()
    ];

    // Try exact matches first
    for (var i = 0; i < variations.length; i++) {
        var field = form.find('input[name="' + variations[i] + '"]');
        if (field.length) {
            console.log('Found exact match field:', variations[i]);
            return field;
        }
    }

    // Try case-insensitive attribute contains as fallback
//     for (var i = 0; i < variations.length; i++) {
//         var field = form.find('input[name*="' + variations[i] + '" i]');
//         if (field.length) {
//             console.log('Found case-insensitive field:', field.attr('name'));
//             return field;
//         }
//     }

    return null;
}


function populateHiddenFields() {

    // Define base parameters - will work with any case variations
    var parameters = [
        'cid',
        'k',
        'c',
        'gclid',
        'fbclid',
        'msclkid',
        'source',
        'medium',
        'kw',
        'content',
        'cv'
    ];

    var forms = jQuery('.frm-fluent-form');
    // console.log('Found forms:', forms.length);

    forms.each(function() {
        var form = jQuery(this);
        var formId = form.attr('data-form_id');
        // console.log('Processing form:', formId);

        parameters.forEach(function(param) {
            var cookieValue = getCookie('wp_' + param.toLowerCase());
            if (cookieValue) {
                var existingField = findField(form, param);
                // console.log('Processing parameter:', param, 'Cookie value:', cookieValue, 'Field found:', !!existingField);

                if (existingField) {
                    existingField.val(cookieValue);
                    // console.log('Updated field value:', {
                    //     name: existingField.attr('name'),
                    //     value: existingField.val()
                    // });
                }
            }
        });
    });
}

jQuery(document).on('fluentform_init', function() {
  // console.log('Fluent Form init event triggered');
  populateHiddenFields();
});

setTimeout(populateHiddenFields, 1000);

function initializeFormHandler() {
    console.log('Initializing form handler');
    // populateHiddenFields();



    jQuery(document).on('ff_step_changed', function(event, data) {
        console.log('Form step changed, repopulating fields');
        //setTimeout(populateHiddenFields, 100);
    });

    //
    //setTimeout(populateHiddenFields, 2000);
}
