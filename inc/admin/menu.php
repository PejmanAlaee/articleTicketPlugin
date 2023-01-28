<?php

function fa_number($number)
{
    if (!is_numeric($number) || empty($number))
        return '۰';
    $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
    return str_replace($en, $fa, $number);
}

function persian($time)
{
    $myArray =  explode(":", $time);
    $arr = [];
    for ($i = 0; $i < count($myArray); $i++) {
        $arr[$i] = fa_number($myArray[$i]);
    }
    $ans = '';
    array_splice($arr, 1, 0, ":");
    array_splice($arr, 3, 0, ":");
    for ($z = 0; $z < count($arr); $z++) {
        $ans .= $arr[$z];
    }
    return $ans;
}


add_action("admin_menu", "fncc");

function fncc()
{


    add_menu_page(
        "سامانه پشتیبانی",
        "سامانه پشتیبانی",
        "manage_options",
        "set",
        'func__menu'
    );

    add_submenu_page(
        "set",
        "پلاگین",
        "اضافه کردن بخش  ",
        "manage_options",
        "wp_apis",
        'func_handeler__submenu'
    );

    add_submenu_page(
        "set",
        "2پلاگین",
        "اضافه کردن سرویس  ",
        "manage_options",
        "wp_apis2",
        'func_handeler__submenu_add_service'
    );
    add_submenu_page(
        "set",
        "add",
        "اضافه کردن به کاربران  ",
        "manage_options",
        "wp_apis3",
        'func_handeler__submenu_add'
    );
}
function func__menuMain()
{
    global $wpdb;
    include WF_aricle_tpl . 'admin/menu/dashboardFile.php';
    return;
}

function func_handeler__submenu_add()
{
    global $wpdb;

    $user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users");
    $sectionName = "";
    $personName = "";
    $serviceName  = "";
    if (isset($_GET['action']) && $_GET['action'] == 'show') {
        $serviceInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}serviceInformation");
        $sectionInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}section_information");
        $addinformations = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}addinformations");

        if (isset($_GET['z']) && $_GET['z'] == 'removeService') {
            $serviceDeleteId = $_GET['serviceDelete'];
            $wpdb->delete(
                $wpdb->prefix . 'addinformations',
                ['customer_id' =>   $serviceDeleteId],
                ['%d'],
            );
            $reciverId = $_GET['servicePersonId'];
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?page=wp_apis3&action=show&idPage=$reciverId\">";
        }

        //save service information about current person in database
        if (isset($_POST['saveCurrentPersonService'])) {
            $reciverId = $_GET['idPage'];
            $ServiceNameForCurrentPerson = $_POST['servicePerson'];
            foreach ($user as $sample) :
                if ($sample->ID == $reciverId) {
                    $personName = $sample->display_name;
                    break;
                }
            endforeach;
            foreach ($addinformations as $sample) :
                if ($sample->customer_service_name == $ServiceNameForCurrentPerson) {
                    $flagService  = 1;
                    break;
                }
            endforeach;

            $table = $wpdb->prefix . 'addinformations';
            $data = array(
                'current_Id' => $reciverId,
                'customer_name' => $personName,
                'customer_section_name' => '',
                'customer_service_name' => $ServiceNameForCurrentPerson,
            );
            $wpdb->insert($table, $data);

            echo "<script>alert('درخواست شما ثبت شد ' )</script>";
            echo '<script>location.reload();</script>';
        }

        include WF_aricle_tpl . 'admin/menu/addServiceToCurrentPerson.php';
        return;
    }


    if (isset($_GET['action']) && $_GET['action'] == 'showSction') {
        $sectionInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}section_information");
        $addinformations = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}addinformations");

        if (isset($_GET['z']) && $_GET['z'] == 'removeSection') {

            $sectionDeleteId = $_GET['sectionDelete'];
            $wpdb->delete(
                $wpdb->prefix . 'addinformations',
                ['customer_id' =>   $sectionDeleteId],
                ['%d'],
            );
            $reciverId = $_GET['idPerson'];
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?page=wp_apis3&action=showSction&idPage=$reciverId\">";
        }

        $flag = 0;
        $flagSection = 0;
        //save section information about current person in database
        if (isset($_POST['saveCurrentPersonSection'])) {
            $sectionPersonName = "";
            $reciverId = $_GET['idPage'];
            $SectionNameForCurrentPerson = $_POST['sectionPerson'];
            foreach ($user as $sample) :
                if ($sample->ID == $reciverId) {
                    $sectionPersonName = $sample->display_name;
                    break;
                }
            endforeach;

            foreach ($addinformations as $sample) :
                if ($sample->customer_section_name == $SectionNameForCurrentPerson) {
                    $flagSection  = 1;
                    break;
                }
            endforeach;
            $table = $wpdb->prefix . 'addinformations';
            $data = array(
                'current_Id' => $reciverId,
                'customer_name' => $sectionPersonName,
                'customer_section_name' => $SectionNameForCurrentPerson,
                'customer_service_name' => '',
            );
            $wpdb->insert($table, $data);
            echo "<script>alert('درخواست شما ثبت شد ' )</script>";
            echo '<script>location.reload();</script>';
        }
        include WF_aricle_tpl . 'admin/menu/addSectionToCurrentPerson.php';
        return;
    }



    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $personId = $_GET['personId'];
        $personName = "";
        $personEmail = "";
        $userTable = $wpdb->get_results("SELECT * FROM  {$wpdb->prefix}users");
        foreach ($userTable as $sample) :
            if ($sample->ID == $personId) {
                $personName = $sample->display_name;
                $personEmail = $sample->user_email;
                break;
            }
        endforeach;
        if (isset($_POST['saveCurrentPersonUpdate'])) {
            $personName = $_POST['personNameEdit'];
            $personEmail =  $_POST['personEmailEdit'];
            global $wpdb;
            $wpdb->update(
                $wpdb->prefix . 'users',
                array(
                    'display_name'  => $personName,
                    'user_email'  => $personEmail
                ),
                array('ID' =>  $personId),
            );
            echo "<script>alert('درخواست شما ثبت شد ' )</script>";
        }

        include WF_aricle_tpl . 'admin/menu/updatePersonLogin.php';
        return;
    }
    if (isset($_GET['action']) && $_GET['action'] == 'RegisterPerson') {
        if (isset($_POST['saveUpdateRegister'])) {
            $registerNamePerson = $_POST['registerName'];
            $registerEmailPerson = $_POST['registerEmail'];
            $registerPassPerson = $_POST['registerPass'];
            $alert = "";
            if (empty($registerNamePerson) || empty($registerEmailPerson) ||  empty($registerPassPerson)) {
                $alert = ' پر کردن تمامی فیلد ها الزامی میباشد ';
            } elseif (!is_email($registerEmailPerson)) {
                $alert = "ایمیل وارد شده معتبر نمیباشد";
            } elseif (email_exists($registerEmailPerson)) {
                $alert = 'ایمیل مورد نظر از قبل استفاده شده است';
            } elseif (strlen($registerPassPerson) < 8) {
                $alert = ' رمز عبور وارد شده کم تر از هشت کارکتر میباشد !';
            } else {
                $userEmailParts = explode("@", $registerEmailPerson);
                $newUser = wp_insert_user([
                    'user_login' => apply_filters('pre_user_login', $userEmailParts[0] . rand(1000, 9999)),
                    'user_pass' => apply_filters('pre_user_pass', $registerPassPerson),
                    'user_email' => apply_filters('pre_user_email', $registerEmailPerson),
                    'user_last_name' => apply_filters('pre_user_last_name', $registerNamePerson),
                    'display_name' => apply_filters('pre_user_display_name', "{$registerNamePerson}"),
                ]);
                $alert = 'عملیات ثبت نام با موفیقت انجام شد !';
            }
            echo "<script>alert(`$alert` )</script>";
        }
        include WF_aricle_tpl . 'admin/menu/registerForm.php';
        return;
    }

    if (isset($_GET['action']) && $_GET['action'] == 'remove') {

        $personRemoveId = $_GET['personRemoveId'];
        $wpdb->delete(
            $wpdb->prefix . 'users',
            ['ID' =>   $personRemoveId],
            ['%d'],
        );
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?page=wp_apis3\">";
    }
    if (isset($_POST['saveSearchMainAdd'])) {
        $text = $_POST['saveSearchMainAddPage'];
        $user = $wpdb->get_results("SELECT * FROM  {$wpdb->prefix}users WHERE display_name ='$text' or user_email ='$text' ");
    }


    include WF_aricle_tpl . 'admin/menu/mainAdd.php';
}



function func_handeler__submenu_add_service()
{
    global $wpdb;
    $flag = 0;
    $serviceInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}serviceInformation");


    if (isset($_POST['saveService'])) {
        $service = $_POST['servicePerson'];
        echo "<script>alert('اطلاعات ثبت شد' )</script>";
        $table = $wpdb->prefix . 'serviceInformation';
        $data = array(
            'customer_service' => $service,
        );
        $wpdb->insert($table, $data);
        $flag = 1;
        echo '<script>location.reload();</script>';
    }

    if (isset($_GET['serviceAddPage']) && $_GET['serviceAddPage'] == 'remove') {

        $wpdb->delete(
            $wpdb->prefix . 'serviceInformation',
            ['customer_id' => $_GET['serviceItem']],
            ['%d'],
        );
    }
    if (isset($_GET['serviceAddPage']) && $_GET['serviceAddPage'] == 'edit') {
        $serviceName =  $_GET['serviceName'];
        $serviceId =  $_GET['serviceItem'];

        if (isset($_POST['saveUpdateService'])) {
            global $wpdb;
            $serviceName =  $_POST['updateService'];
            $wpdb->update(
                $wpdb->prefix . 'serviceinformation',
                array(
                    'customer_service'  => $serviceName,
                ),
                array('customer_id' =>  $serviceId),
            );
            echo "<script>alert('درخواست شما ثبت شد' )</script>";
        }

        include WF_aricle_tpl . 'admin/menu/updateService.php';
        return;
    }

    $serviceInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}serviceInformation");
    if (isset($_POST['saveSearchAddService'])) {
        $serviceSearch = $_POST['searchAddServicePage'];

        $serviceInformation = $wpdb->get_results("SELECT * FROM  {$wpdb->prefix}serviceInformation WHERE customer_service ='$serviceSearch' ");
    }


    include WF_aricle_tpl . 'admin/menu/addService.php';
}

function func_handeler__submenu()

{
    global $wpdb;
    $user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users");
    $sectionInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}section_information");
    $flag = 0;
    if (isset($_POST['saveSection'])) {
        $section = $_POST['sectionPerson'];
        echo "<script>alert('اطلاعات ثبت شد' )</script>";
        $table = $wpdb->prefix . 'section_information';
        $data = array(
            'customer_name' => $section,
        );
        $wpdb->insert($table, $data);
        $flag = 1;
        echo '<script>location.reload();</script>';
    }
    if (isset($_GET['sectionAddPage']) && $_GET['sectionAddPage'] == 'remove') {
        $wpdb->delete(
            $wpdb->prefix . 'section_information',
            ['customer_id' => $_GET['sectionItem']],
            ['%d'],
        );
    }
    if (isset($_GET['sectionAddPage']) && $_GET['sectionAddPage'] == 'edit') {
        $sectionName =  $_GET['sectionName'];
        $sectionId =  $_GET['sectionItem'];

        if (isset($_POST['saveUpdateSection'])) {
            global $wpdb;
            $sectionName =  $_POST['updateSection'];
            $wpdb->update(
                $wpdb->prefix . 'section_information',
                array(
                    'customer_name'  => $sectionName,
                ),
                array('customer_id' =>  $sectionId),
            );
            echo "<script>alert('درخواست شما ثبت شد' )</script>";
        }

        include WF_aricle_tpl . 'admin/menu/updateSection.php';
        return;
    }


    $sectionInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}section_information");

    include WF_aricle_tpl . 'admin/menu/addSection.php';
}



function func__menu()
{
    if (isset($_POST['saveSearch'])) {
        global $wpdb;
        $search = $_POST['search'];
        $samples = $wpdb->get_results("SELECT * FROM  {$wpdb->prefix}mainPersonTable WHERE  name ='$search' or  inputAddress ='$search' or  SupportCenter ='$search' ");
        include WF_aricle_tpl . 'admin/menu/formShow.php';
        return;
    }
    global $wpdb;
    $samples = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}mainPersonTable");
    $chatPerson = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}chat");

    $editText = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}mainPersonTable");



    if (isset($_GET['send']) && $_GET['send'] == 'sendMessage') {
        global $wpdb;
        $reciverId = $_GET['idPage'];
        $sam = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}mainPersonTable");

        if (isset($_POST['saveEdittt'])) {
            require("jdf.php");
            $date = jdate("Y/m/d");

            $wpdb->update(
                $wpdb->prefix . 'mainPersonTable',
                array(
                    'lastEdit' => $date,
                ),
                array('id' => $reciverId),
            );
            $from = $_POST['from'];
            $answer = $_POST['answer'];
            $timeAdminn = $_POST['time'];
            $timeAdmin =  persian($timeAdminn);
            $table = $wpdb->prefix . 'chat';
            $data = array(
                'sender_type' => $from,
                'receiver' =>  $reciverId,
                'text' =>  $answer,
                'timeSender' =>  $timeAdmin,
                'History' =>  $date,
            );
            $wpdb->insert($table, $data);
        }

        include WF_aricle_tpl . 'admin/menu/sentMassageToCurrentPerson.php';
        return;
    }



    if (isset($_GET['action']) && $_GET['action'] == 'showChat') {
        if (isset($_POST['closeTicket'])) {
            $personId = $_GET['idPage'];
            $wpdb->update(
                $wpdb->prefix . 'mainPersonTable',
                array(
                    'conditionType'  => "بسته است",
                ),
                array('id' => $personId),
            );
            echo '<script>location.reload();</script>';

            include WF_aricle_tpl . 'admin/menu/formShow.php';
            return;
        } else {
            include WF_aricle_tpl . 'admin/menu/showChat.php';
            return;
        }
    }


    if (isset($_GET['action']) && $_GET['action'] == 'edit') {

        $idEdit =  $_GET['idEdit'];
        foreach ($editText as $sample) :
            if ($sample->id ==  $idEdit) {
                $sName = $sample->name;
                $stime = $sample->t;
                $sEmail = $sample->emailSender;
                $sLevelrticle = $sample->levelArc;
                $sMsg = $sample->msg;
                break;
            }
        endforeach;

        if (isset($_POST['saveEdit'])) {
            $personFirstName = $_POST['personFirstName'];
            $personLastName = $_POST['personLastName'];
            $personEmail = $_POST['personEmail'];
            $levelArticlee = $_POST['levelArticlee'];
            $persontx = $_POST['persontx'];
            $wpdb->update(
                $wpdb->prefix . 'mainPersonTable',
                array(
                    'name'  => $personFirstName,
                    'family' =>  $personLastName,
                    'levelArc' =>  $levelArticlee,
                    'msg' =>  $persontx,
                    'emailSender' =>  $personEmail,
                ),
                array('id' => $idEdit),
            );
        }

        include WF_aricle_tpl . 'admin/menu/userEditt.php';
        return;
    }
    if (isset($_GET['action']) && $_GET['action'] == "remove") {
        $wpdb->delete(
            $wpdb->prefix . 'mainPersonTable',
            ['id' => $_GET['item']],
            ['%s'],
        );
    }
    if (isset($_GET['action']) && $_GET['action'] == "sendMessage") {
    }

    $samples = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}mainPersonTable");
    add_query_arg(['pinInfo' =>  1]);
    include WF_aricle_tpl . 'admin/menu/formShow.php';
}
