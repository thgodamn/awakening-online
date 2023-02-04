<?php

require_once __DIR__.'/config.php';

use ClassApi\AFSession;
use ClassApi\Lead;
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

class Controller
{
    protected $leads;
    protected $afsession;
    protected $config;

    public function __construct()
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        $this->afsession = new AFSession();
        $this->leads = new Lead();
    }

    public function saveAFSession($params) {

        $clickid = $params['clickid'];
        $pid = $params['pid'];
        $sub1 = $params['sub1'];
        $sub2 = $params['sub2'];
        $sub3 = $params['sub3'];
        $sub4 = $params['sub4'];
        $sub5 = $params['sub5'];

    }

    public function getAFSession() {
        return 1;
    }

    //get ajax offers with set paged
    public function postLead($params) {

        //security
        //sanitize_text_field( $params );
        //map_deep( $params, 'sanitize_text_field' );

        $name = $params['name'];
        $phone = $params['phone'];
        $email = $params['email'];
        $telegram = $params['telegram'];
        $afsession_id =  $this->getAFSession();
        $form_id = (isset($params['form_id'])) ? $params['form_id']: 1;

        $wp_verify_nonce = false;
        if (!empty($params) && !isset( $params['form_contact_course_nonce'] ) && !wp_verify_nonce( $params['form_contact_course_nonce'], 'form_contact_course' )) {
            $wp_verify_nonce = true;
        } elseif (!empty($params) && !isset( $params['form_contact_lead_nonce'] ) && !wp_verify_nonce( $params['form_contact_lead_nonce'], 'form_contact_lead' )) {
            $wp_verify_nonce = true;
        } elseif (empty($params)) $wp_verify_nonce = true;
        if (!$wp_verify_nonce)
            return;

        global $wpdb;
        try {

            $query = "INSERT INTO {$this->leads->table_name} (`session_id`, `form_id`, `name`, `email`, `phone`, `telegram`)
                    VALUES ('$afsession_id','$form_id', '$name', '$email', '$phone', '$telegram')";

            $result = $wpdb->query( $wpdb->prepare($query));

            $to = "info@awakening-online.ru";
            $subject = "Новый лид - $name $phone @$telegram";
            $message = "
                <div>Имя: $name,</div>
                <div>Email: $email,</div>
                <div>Телефон: $phone,</div>
                <div>Телеграм: @$telegram,</div>
            ";

            wp_mail( $to, $subject, $message );

            return rest_ensure_response( [
                'params' => $params,
                'result' => $result,
            ] );

        } catch (Exception $e) {
            return rest_ensure_response( [
                'msg' => 'Сообщение не было отправлено',
                'result' => false,
            ] );
        }


    }

}
