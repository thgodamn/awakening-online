<?php
namespace ClassApi;
class AFSession extends IntegerClass
{

    public $table_name;

    public function __construct()   {
        $this->table_name = 'mb_afsession';
        $this->createTable();
    }

    public function createTable() {
        $sql = "
            CREATE TABLE {$this->table_name} (
                        id   bigint(20) NOT NULL AUTO_INCREMENT,
                        hash varchar(255) NOT NULL,
                        ip varchar(255) NOT NULL,
                        browser varchar(255) NOT NULL,
                        clickid varchar(255),
                        pid varchar(255),
                        sub1 varchar(255),
                        sub2 varchar(255),
                        sub3 varchar(255),
                        sub4 varchar(255),
                        sub5 varchar(255),
                        PRIMARY KEY (id)
                    );
        ";

        dbDelta($sql);
    }

}