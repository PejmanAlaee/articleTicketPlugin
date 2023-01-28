<?php

use LDAP\Result;

function creating_order_tables()
{
    global $wpdb;

    // Set table name
    $table = $wpdb->prefix . 'section_information';

    $charset_collate = $wpdb->get_charset_collate();

    // Write creating query
    $query =  "CREATE TABLE IF NOT EXISTS  " . $table . " (
                customer_id DOUBLE AUTO_INCREMENT,
                customer_name VARCHAR(255),
                PRIMARY KEY(customer_id)
                )$charset_collate;";

    // Execute the query
    $wpdb->query($query);
}

function create_add_service()
{
    global $wpdb;

    // Set table name
    $table = $wpdb->prefix . 'serviceInformation';

    $charset_collate = $wpdb->get_charset_collate();

    // Write creating query
    $query =  "CREATE TABLE IF NOT EXISTS  " . $table . " (
                customer_id DOUBLE AUTO_INCREMENT,
                customer_service VARCHAR(255),
                PRIMARY KEY(customer_id)
                )$charset_collate;";

    // Execute the query
    $wpdb->query($query);
}


function create_add_service_and_section()
{
    global $wpdb;

    // Set table name
    $table = $wpdb->prefix . 'addinformations';

    $charset_collate = $wpdb->get_charset_collate();

    // Write creating query
    $query =  "CREATE TABLE IF NOT EXISTS  " . $table . " (
                customer_id DOUBLE AUTO_INCREMENT,
                current_Id DOUBLE,
                customer_name VARCHAR(255),
                customer_service_name VARCHAR(255),
                customer_section_name VARCHAR(255),
                PRIMARY KEY(customer_id)
                )$charset_collate;";

    // Execute the query
    $wpdb->query($query);
}
function makePerson()
{
    global $wpdb;

    // Set table name
    $table = $wpdb->prefix . 'mainPersonTable';

    $charset_collate = $wpdb->get_charset_collate();

    // Write creating query
    $query =  "CREATE TABLE IF NOT EXISTS  " . $table . " (
                id DOUBLE AUTO_INCREMENT,
                t VARCHAR(255),
                name VARCHAR(255),
                CEmail VARCHAR(255),
                msg VARCHAR(255),
                emailSender VARCHAR(255),
                inputAddress VARCHAR(255),
                service VARCHAR(255),
                SupportCenter VARCHAR(255),
                Priority VARCHAR(255),
                conditionType VARCHAR(255),
                cd VARCHAR(255),
                lastEdit VARCHAR(255),
                PRIMARY KEY(id)
                )$charset_collate;";

    // Execute the query
    $wpdb->query($query);
}

function chat()
{
    global $wpdb;

    // Set table name
    $table = $wpdb->prefix . 'chat';

    $charset_collate = $wpdb->get_charset_collate();

    // Write creating query
    $query =  "CREATE TABLE IF NOT EXISTS  " . $table . " (
                id DOUBLE AUTO_INCREMENT,
                sender_type VARCHAR(255),
                receiver VARCHAR(255),
                text VARCHAR(255),
                timeSender VARCHAR(255),
                History VARCHAR(255),
                inputAddress VARCHAR(255),
                PRIMARY KEY(id)
                )$charset_collate;";

    // Execute the query
    $wpdb->query($query);
}

$idSender;
function wp_setter($atts, $content = null)
{
  chat();
  makePerson();
  creating_order_tables();
  create_add_service();
  create_add_service_and_section();
  global $wpdb;
  $current_user = wp_get_current_user();
  $name = $current_user->user_nicename;
  $userCurrentEmail = $current_user->user_email;
  $currerntUser =  wp_json_encode($userCurrentEmail);
  $currentId =  $current_user->ID;
  if (isset($_POST['saveSearchMain'])) {
    global $wpdb;
    $search = $_POST['searchForm'];
    $userTable = $wpdb->get_results("SELECT * FROM  {$wpdb->prefix}mainPersonTable WHERE  name ='$search' or  inputAddress ='$search' or  SupportCenter ='$search' ");
    include WF_aricle_tpl . "front/setArticle.php";
    return;

}
  $serviceInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}serviceInformation");
  $currentinformations = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}addinformations");
  $secInformation = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}section_information");
  $userTable = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}mainPersonTable");
  $chatTable = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}chat");
  if (isset($_GET['action']) && $_GET['action'] == 1) {
    include WF_aricle_tpl . "front/userResult.php";
    return;
  } else
  if (isset($_GET['action']) && $_GET['action'] == 'answerAgain') {
    $idSenderUse = $_GET['id'];
    include WF_aricle_tpl . 'front/answer.php';
    return;
  } else
  if (isset($_GET['action']) && $_GET['action'] == 'a') {
    $idSenderUse = $_GET['idSett'];
    include WF_aricle_tpl . 'front/showSpecial.php';
    return;
  } else {
    include WF_aricle_tpl . "front/setArticle.php";
  }
}

add_shortcode('article', 'wp_setter');
