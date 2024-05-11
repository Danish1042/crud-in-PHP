<?php
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "crud_operations");

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$connection){
        die("Connection Failed");
    }

    // Create Table If Not exists
    $table = "CREATE TABLE IF NOT EXISTS `crud_operations`.`students` (`id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `age` INT(11) NOT NULL , `email` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    if(!$connection->query($table)){
        echo "Table creation failed: (" . $connection->errno . ") " . $connection->error;
    }
?>