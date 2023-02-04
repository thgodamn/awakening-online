<?php

namespace ClassApi;

class Form extends IntegerClass
{

    public $table_name;

    public function __construct()
    {
        $this->table_name = 'mb_form';
        $this->createTable();
    }

    public function createTable() {

        $sql = "
            CREATE TABLE {$this->table_name} (
                        id   bigint(20) NOT NULL AUTO_INCREMENT,
                        slug varchar(255),
                        form_name varchar(255),
                        cost_lead int(11),
                        PRIMARY KEY (id)
                    );
            INSERT INTO {$this->table_name} (`id`, `slug`,`form_name`, `cost_lead`)
                    VALUES ('1','form_course', 'Подобрать курс', '500'),
                           ('2','form_lead', 'Оставить заявку', '500');
        ";

        dbDelta($sql);
    }

}