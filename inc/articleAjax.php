<?php


function wp_do()
{
    $name = sanitize_text_field($_POST['name']);
    $email = $_POST['email'];
    $Priority = sanitize_text_field($_POST['Priority']);
    $inputAddress = sanitize_text_field($_POST['inputAddress']);
    $service = sanitize_text_field($_POST['service']);
    $textAria = $_POST['textAria'];
    $SupportCenter = $_POST['SupportCenter'];
    $time = $_POST['time'];
    $cd = $_POST['cd'];
    $userCurrentEmail = "";
    global $wpdb;
    $userTable = $wpdb->get_results("SELECT * FROM  {$wpdb->prefix}users");
    $validation_resultss = wp_validation($name, $inputAddress,$textAria, $email);
    if (!$validation_resultss['is_valid']) {
        wp_send_json([
            'success' => false,
            'messege' => $validation_resultss['message'],
        ], 402);
    }

    $tl = $wpdb->prefix . 'mainPersonTable';
    $dt = array(
        't' => $time,
        'name' =>  $name,
        'CEmail' => $email,
        'msg' =>  $textAria,
        'emailSender' =>  $email,
        'inputAddress' =>  $inputAddress,
        'service' =>  $service,
        'SupportCenter' =>  $SupportCenter,
        'Priority' => $Priority,
        'conditionType' =>" باز است",
        'cd' => $cd,
        'lastEdit' => $cd,
    );
    $wpdb->insert($tl, $dt);
    wp_send_json([
        'success' => true,
        'messege' => ' عملیات با موفقیت انجام شد',
    ], 200);
}

add_action('wp_ajax_wp_articlee', 'wp_do');

function wp_validation($name, $inputAddress, $textAria, $email)
{

    $result = [
        'is_valid' => true,
        'message' => ""

    ];
    if (is_null($name) || empty($name)) {
        $result['is_valid'] = false;
        $result['message'] = "نام شما نمیتواند خالی باشد";
        return $result;
    }

    if (is_null($inputAddress) || empty($inputAddress)) {
        $result['is_valid'] = false;
        $result['message'] = " موضوع شما نمیتواند خالی باشد";
        return $result;
    }

    if (is_null($email) || empty($email)) {
        $result['is_valid'] = false;
        $result['message'] = "  ایمیل نمیتواند خالی باشد";
        return $result;
    }

    if (is_null($textAria) || empty($textAria)) {
        $result['is_valid'] = false;
        $result['message'] = " متن شما نمیتواند خالی باشد";
        return $result;
    }

    return $result;
}


add_action('wp_ajax_wp_article_msg', 'wp_doo');

function wp_doo()
{
    $textAriaa = sanitize_text_field($_POST['textAria']);
    $idSender = $_POST['idSender'];
    $time = $_POST['time'];
    $cd = $_POST['cd'];
    $validation_resultss = wp_validationn($textAriaa);

    if (!$validation_resultss['is_valid']) {
        wp_send_json([
            'success' => false,
            'messege' => $validation_resultss['messege'],
        ], 401);
    } else {
        global $wpdb;

        $wpdb->update(
            $wpdb->prefix . 'mainPersonTable',
            array(
                'lastEdit' => $cd,
            ),
            array('id' => $idSender),
        );

        $table = $wpdb->prefix . 'chat';
        $data = array(
            'sender_type' => 'User',
            'receiver'  => $idSender,
            'text' =>  $textAriaa,
            'timeSender' =>  $time,
            'History' =>  $cd,
        );
        $wpdb->insert($table, $data);

        wp_send_json([
            'success' => true,
            'messege' => 'اطلاعات ثبت شد',
        ], 200);
    }
}
function wp_validationn($textAriaa)
{
    $resultt = [
        'is_valid' => true,
        'messege' => ""

    ];

    if (is_null($textAriaa) || empty($textAriaa)) {
        $resultt['is_valid'] = false;
        $resultt['messege'] = " متن شما نمیتواند خالی باشد";
        return $resultt;
    }
    return $resultt;
}
