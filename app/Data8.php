<?php

namespace app;

class Data8
{
    function enqueue_admin_script( $hook ) {
        if ( 'fluent-forms-pro_page_fluentform_data_8_settings' != $hook ) {
            return;
        }

        wp_register_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), '1.0' );
        wp_register_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '1.0' );
        wp_enqueue_style('select2-css');
        wp_enqueue_script('select2-js');
    }

    function add_cookies_values($response)
    {
        $formApi = fluentFormApi('forms');
        $formObj = $formApi->find($formId = $response['form_id']);
        $form_fields = json_decode($formObj->form_fields);
        $hidden_fields = array_filter($form_fields->fields, function ($field) {
            return $field->element == 'input_hidden';
        });

        foreach($hidden_fields as $hf) {
            if(isset($_COOKIE['wp_'.strtolower($hf->attributes->name)])) {
                $resp = json_decode($response['response']);
                $resp->{strtolower($hf->attributes->name)} = $_COOKIE['wp_'.strtolower($hf->attributes->name)];
                $response['response'] = json_encode($resp);
            }
        }

        return $response;
    }


//  Mind Web Tree || added code to validate Fluent form email and phone number
    function validate_fluent_form($insertData, $data, $form)
    {
        $form_fields = json_decode($form->form_fields);
        $hidden_fields = array_filter($form_fields->fields, function ($field) {
            return $field->element == 'input_hidden';
        });

        foreach($hidden_fields as $hf) {
            if(isset($_COOKIE['wp_'.strtolower($hf->attributes->name)])) {
                $response = json_decode($insertData['response']);
                $response->{strtolower($hf->attributes->name)} = $_COOKIE['wp_'.strtolower($hf->attributes->name)];
                $insertData['response'] = json_encode($response);
            }
        }

        $data_8_settings = get_option('data_8_settings');
        $ff_forms = json_decode($data_8_settings['ff_forms']);
        if ($data_8_settings && isset($data_8_settings['validate']) && $data_8_settings['validate'] == 1 ?? count($ff_forms) > 0) {
            $wrong_email = isset($data_8_settings['wrong_email']) ? esc_attr($data_8_settings['wrong_email']) : 'Please enter a valid email';
            $wrong_phone = isset($data_8_settings['wrong_phone']) ? esc_attr($data_8_settings['wrong_phone']) : 'Please enter a valid phone';
            $emailFieldName = 'email';
            $phoneFieldName = 'phone';

            if (in_array($form->id, $ff_forms)) {
                // Validate email
                if (!empty($data[$emailFieldName])) {
                    $email = $data[$emailFieldName];
                    $emailValidationResult = $this->validate_fields_with_data_8_api('https://webservices.data-8.co.uk/EmailValidation/IsValid.json', array(
                        'email' => $email,
                        'level' => 'address',
                    ));
                    if (!is_wp_error($emailValidationResult) && isset($emailValidationResult['Status']['Success']) && $emailValidationResult['Status']['Success'] != false) {
                        if ($emailValidationResult['Result'] !== 'Valid') {
                            wp_send_json([
                                'errors' => [
                                    $emailFieldName => $wrong_email
                                ]
                            ], 422);
                        }
                    }
                }
                //  Validate Phone No.
                if (!empty($data[$phoneFieldName])) {
                    $phone = $data[$phoneFieldName];
                    $phoneValidationResult = $this->validate_fields_with_data_8_api('https://webservices.data-8.co.uk/PhoneValidation/IsValid.json', array(
                        'telephoneNumber' => $phone,
                        'defaultCountry' => "UK",
                    ));
                    die(var_dump($phoneValidationResult));
                    if (isset($phoneValidationResult['Result']['ValidationResult']) && $phoneValidationResult['Result']['ValidationResult'] !== 'Valid') {
                        wp_send_json([
                            'errors' => [
                                $phoneFieldName => $wrong_phone
                            ]
                        ], 422);
                    }
                }
            }
            return $insertData;
        }
    }

//  Mind Web Tree || Common function to validate with  Data 8 api
    function validate_fields_with_data_8_api($apiUrl, $data)
    {
        $data_8_settings = get_option('data_8_settings');
        $username = $data_8_settings['username'];
        $password = $data_8_settings['password'];
        $response = wp_remote_post($apiUrl, array(
            'headers' => array(
                'Authorization' => 'Basic ' . base64_encode("$username:$password"),
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($data)
        ));

        if (is_wp_error($response)) {
            return $response;
        }
        $body = wp_remote_retrieve_body($response);
        $result = json_decode($body, true);
        return $result;
    }

    function ajax_data_8_validate() {
        $data_8_settings = get_option('data_8_settings');
        $ff_forms = json_decode($data_8_settings['ff_forms']);
        $form_id = isset($_POST['form_id']) ? $_POST['form_id'] : -1;
        $type = isset($_POST['type']) ? $_POST['type'] : false;
        $value = isset($_POST['value']) ? $_POST['value'] : false;

        if ($data_8_settings && isset($data_8_settings['validate']) && $data_8_settings['validate'] == 1 && count($ff_forms) > 0 && $type && $value) {

            $wrong_email = isset($data_8_settings['wrong_email']) ? esc_attr($data_8_settings['wrong_email']) : 'Please enter a valid email';
            $wrong_phone = isset($data_8_settings['wrong_phone']) ? esc_attr($data_8_settings['wrong_phone']) : 'Please enter a valid phone';

            if (in_array($form_id, $ff_forms)) {
                $result = [];
                if ($type === 'phone') {
                    $result = $this->validate_fields_with_data_8_api('https://webservices.data-8.co.uk/PhoneValidation/IsValid.json', array(
                        'telephoneNumber' => $value,
                        'defaultCountry' => "UK",
                    ));
                }
                if ($type === 'email') {
                    $result = $this->validate_fields_with_data_8_api('https://webservices.data-8.co.uk/EmailValidation/IsValid.json', array(
                        'email' => $value,
                        'level' => 'address',
                    ));
                }
                if ($result['Result'] !== 'Valid') {
                    wp_send_json([
                        'errors' => [
                            $type => $type === 'phone' ? $wrong_phone : $wrong_email
                        ]
                    ], 422);
                }
            }
        }
    }

    //  Mind Web Tree || Added submenu navigation to manage Data 8 settings
    public function add_navigation_under_fluent_form()
    {
        add_submenu_page(
            'fluent_forms',
            'Data 8 settings',
            'Data 8 settings',
            'manage_options',
            'fluentform_data_8_settings',
            [$this, 'data_8_navigation']
        );
    }

    //  Mind Web Tree || Interface to manage  Data 8 settings
    public function data_8_navigation()
    {
        $saved_settings = get_option('data_8_settings', array());
        // Retrieve individual settings
        $username = isset($saved_settings['username']) ? esc_attr($saved_settings['username']) : '';
        $password = isset($saved_settings['password']) ? esc_attr($saved_settings['password']) : '';
        $validate = isset($saved_settings['validate']) && $saved_settings['validate'] == 1 ? 'checked="checked"' : '';
        $wrong_email = isset($saved_settings['wrong_email']) ? esc_attr($saved_settings['wrong_email']) : 'Please enter a valid email';
        $wrong_phone = isset($saved_settings['wrong_phone']) ? esc_attr($saved_settings['wrong_phone']) : 'Please enter a valid phone';
        $ff_forms = [];
        if ($saved_settings) {
            $ff_forms = json_decode($saved_settings['ff_forms']);
        }
        $formApi = fluentFormApi('forms')->forms();
        $forms = $formApi['data'];
        ?>
        <div class="wrap">
            <h1>Custom Admin Page</h1>

            <form method="post" action="" name="data_8_form">

                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="username">Username</label></th>
                        <td><input type="text" name="username" id="username" value="<?php echo $username; ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="password">Password</label></th>
                        <td><input type="password" name="password" id="password" value="<?php echo $password; ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th scope="row">Validation</th>
                        <td><label><input type="checkbox" name="validate" <?php echo $validate; ?> value="1"></label></td>
                    </tr>
                    <tr>
                        <th scope="row">FF Forms:</th>
                        <td>
                            <select class="ff-multiple-forms regular-text" name="ff_forms[]" multiple>
                                <?php foreach ($forms as $form): ?>
                                    <option value="<?php echo $form->id; ?>" <?php echo in_array($form->id, $ff_forms) ? 'selected' : ''; ?> ><?php echo $form->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Incorrect Email Messsage:</th>
                        <td><input type="text" name="wrong_email" id="wrong_email" value="<?php echo $wrong_email; ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th scope="row">Incorrect Phone Messsage:</th>
                        <td><input type="text" name="wrong_phone" id="wrong_phone" value="<?php echo $wrong_phone; ?>" class="regular-text"></td>
                    </tr>
                </table>

                <input type="submit" name="data_8_settings" id="submit" class="button button-primary" value="Submit">
            </form>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.ff-multiple-forms').select2();
                jQuery('[name="data_8_form"]').submit(function (e) {
                    e.preventDefault();
                    jQuery.ajax({
                        type : 'POST',
                        url : '/wp-json/data_8/v1/save',
                        data : jQuery(this).serialize(),
                        success : function(data){
                            jQuery('.user-notif').remove();
                            jQuery('<div class="notice notice-success user-notif"><p>'+data.data.message+'</p></div>').insertAfter('.wrap h1');
                        },
                        error : function(data){
                            jQuery('.user-notif').remove();
                            jQuery('<div class="notice notice-error user-notif"><p>'+data.responseJSON.data.message+'</p></div>').insertAfter('.wrap h1');
                        }
                    })
                })
            });
        </script>
        <?php
    }

    //  Mind Web Tree || function to Save data 8 settings to databse
    public function save_data_8_settings()
    {
        register_rest_route('data_8/v1', 'save', array(
            'methods' => 'POST',
            'callback' => array($this, 'data_8_save'),
            'permission_callback' => '__return_true'
        ));
    }

    public function data_8_save($request)
    {
        // Retrieve submitted values
        $username = sanitize_text_field($request->get_param('username'));
        $password = sanitize_text_field($request->get_param('password'));
        $wrong_email = sanitize_text_field($request->get_param('wrong_email'));
        $wrong_phone = sanitize_text_field($request->get_param('wrong_phone'));
        $validate = $request->get_param('validate') !== null ? 1 : 0;
        $ff_forms = $request->get_param('ff_forms') ?? [];
        // Example validation
        if (empty($username) || empty($password)) {
            // Display error message
            return wp_send_json_error(['message' => 'Please fill <code>username</code>  and <code>password</code> field.'], 422);
        } else {
            $settings = array(
                'username' => $username,
                'password' => $password,
                'validate' => $validate,
                'wrong_email' => $wrong_email,
                'wrong_phone' => $wrong_phone,
                'ff_forms' => json_encode($ff_forms),
            );
            update_option('data_8_settings', $settings);
            return wp_send_json_success(['message' => __('Data 8 settings saved successfully!')], 200);
        }
    }

    public function init()
    {
        add_action('rest_api_init', array($this, 'save_data_8_settings'));
        add_action('admin_menu', [$this, 'add_navigation_under_fluent_form']);
        add_action('wp_ajax_data_8_validate', [$this, 'ajax_data_8_validate']);
        add_action('wp_ajax_nopriv_data_8_validate', [$this, 'ajax_data_8_validate']);
        add_action( 'admin_enqueue_scripts', [$this,'enqueue_admin_script'] );
        add_action('fluentform_before_insert_submission', [$this, 'validate_fluent_form'], 10, 3);
        add_filter('fluentform/filter_insert_data', [$this,'add_cookies_values'], 10, 1);
    }
}
