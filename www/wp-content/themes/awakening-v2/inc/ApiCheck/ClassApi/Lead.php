<?php

namespace ClassApi;
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

class Lead extends IntegerClass
{

    public $table_name;

    public function __construct()
    {
        $this->table_name = 'mb_leads';
        $this->createTable();
    }

    public function createTable() {

        $sql = "
            CREATE TABLE {$this->table_name} (
                        id   bigint(20) NOT NULL AUTO_INCREMENT,
                        session_id bigint(20),
                        form_id varchar(255),
                        name varchar(255),
                        email varchar(255),
                        phone varchar(255),
                        telegram varchar(255),
                        PRIMARY KEY (id)
                    );
        ";

        dbDelta($sql);
    }

}