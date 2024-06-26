<?php

require_once __DIR__.'/config.php';

use ClassApi\AFSession;
use ClassApi\Lead;
use ClassApi\Form;
//use \Datetime;
//use \DateTimeZone;
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
        $form_name = (isset($params['form_name'])) ? $params['form_name']: 1;

//        $wp_verify_nonce = false;
//        if (!empty($params) && isset( $params['form_contact_course_nonce'] ) && wp_verify_nonce( $params['form_contact_course_nonce'], 'form_contact_course' )) {
//            $wp_verify_nonce = true;
//        } elseif (!empty($params) && isset( $params['form_contact_lead_nonce'] ) && wp_verify_nonce( $params['form_contact_lead_nonce'], 'form_contact_lead' )) {
//            $wp_verify_nonce = true;
//        }
//        //elseif (empty($params)) $wp_verify_nonce = true;
//        if (!$wp_verify_nonce)
//            return;

//        if ( isset( $_REQUEST[ '_wpnonce' ] ) && wp_verify_nonce( $_REQUEST[ '_wpnonce' ], 'true-nonce' ) ) {
//
//            // делаем что-либо
//
//        } else {
//
//            die( 'Проверка защиты не прошла.' );
//
//        }

        global $wpdb;
        try {

            $query = "INSERT INTO {$this->leads->table_name} (`session_id`, `form_id`, `name`, `email`, `phone`, `telegram`)
                    VALUES ('$afsession_id','$form_id', '$name', '$email', '$phone', '$telegram')";

            $result = $wpdb->query( $wpdb->prepare($query));

            $errors = [];

            if(empty($phone) && empty($email) && empty($telegram) ) {
                return rest_ensure_response( [
                    'msg' => "<span>Ошибка!</span> Заполните форму",
                    'status' => 0,
                ] );
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
                // invalid emailaddress
                $errors[] = [
                    'slug' => 'email',
                    'text' => 'E-mail',
                ];
            }

            if(!preg_match("/^\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}$/", $phone) && !empty($phone) ) {
                // $phone is invalid
                $errors[] = [
                    'slug' => 'phone',
                    'text' => 'Телефон',
                ];
            }

            //формирование ошибки, если email и phone введены неверно
            if (!empty($errors)) {
                $error_text = '';
                $i = 0;
                foreach ($errors as $error) {
                    $i++;
                    $error_text .= $error['text'];
                    if ($i < sizeof($errors))
                        $error_text .= ', ';
                }
                return rest_ensure_response( [
                    'msg' => "<span>Ошибка!</span> Введите корректный <span>$error_text</span><br>(или оставьте поле пустым)",
                    'status' => 0,
                ] );
            }

            $now = new DateTime( "now", new DateTimeZone( "Europe/Moscow" ) );
            $to = "info@awakening-online.ru";
            $subject = "Новый лид - $name $phone @$telegram";
            $message = "
                <div style='margin-bottom: 20px;'>Форма: $form_name</div>
                <div>Имя: $name,</div>
                <div>Email: $email,</div>
                <div>Телефон: $phone,</div>
                <div>Телеграм: $telegram,</div>
                <div class='margin-top: 20px'>Дата (Москва): {$now->format("d-m-Y h:i:s")}</div>
            ";

            wp_mail( $to, $subject, $message );
            return rest_ensure_response( [
                'msg' => '<span>Сообщение успешно отравлено</span>',
                'status' => 1,
            ] );

        } catch (Exception $e) {
            return rest_ensure_response( [
                'msg' => 'Непредвиденная ошибка! Сообщение не было отправлено',
                'status' => 0,
            ] );
        }


    }

}
