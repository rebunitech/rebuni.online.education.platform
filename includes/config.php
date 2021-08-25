<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "rebuni_db";

try{
$link = new PDO("mysql:host=$servername; dbname=$db_name; ", $db_username, $db_password);

$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "Successfuly connected db";
}catch(PDOException $e){
    echo "Fail to connect with DB".$e;
}

?>

<!-- 
// $sql = ["CREATE TABLE IF NOT EXISTS users (
//         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         first_name VARCHAR(150),
//         last_name VARCHAR(150),
//         date_of_birth date,
//         username VARCHAR(30) NOT NULL UNIQUE,
//         is_active boolean ,
//         is_staff boolean,
//         email VARCHAR(100) NOT NULL UNIQUE,
//         phone_number int(50),
//         p_o_box int(5),
//         region varchar(200),
//         state varchar(200),
//         date_registered timestamp DEFAULT CURRENT_TIMESTAMP,
//         sex VARCHAR(10) NOT NULL,
//         password VARCHAR(16) NOT NULL,
        
//         is_admin BOOLEAN NOT NULL DEFAULT 0,
//         is_superuser BOOLEAN NOT NULL DEFAULT 0,
//         user_type VARCHAR(50) NOT NULL,
//         ",

//         "CREATE TABLE IF NOT EXISTS schools(
//             id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//             user_pk int(6),
//             name VARCHAR(100) NOT NULL,
//             email VARCHAR(100) NOT NULL UNIQUE,
//             phone_number int(50),
//             p_o_box int(5),
//             region varchar(200),
//             state varchar(200),
//             date_registered timestamp DEFAULT CURRENT_TIMESTAMP,

//             FOREIGN KEY(user_pk) REFERENCES users(id)
//         );"

//         // "CREATE TABLE IF NOT EXUSTS exam(
//         //     id INT(6) UNSIDE AUTO_INCREMENT PRIMARY KEY,
            
//         // )"
//         ];

// foreach($sql as $query){
//     $link->exec($query);
// }



// FOR CREATING TABLES IN DATABASE COPY THOSE QUERIES AND PAST TO QUERY STUCTURE THEN CREATE IT.

//  FOR USERS TABLE

"CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(150),
        last_name VARCHAR(150),
        date_of_birth date,
        username VARCHAR(30) NOT NULL UNIQUE,
        is_active boolean ,
        is_staff boolean,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone_number int(50),
        p_o_box int(5),
        region varchar(200),
        state varchar(200),
        date_registered timestamp DEFAULT CURRENT_TIMESTAMP,
        sex VARCHAR(10) NOT NULL,
        password VARCHAR(16) NOT NULL,
        
        is_admin BOOLEAN NOT NULL DEFAULT 0,
        is_superuser BOOLEAN NOT NULL DEFAULT 0,
        user_type VARCHAR(50) NOT NULL,
        ",

        // FOR SCHOOLS TABLE
"CREATE TABLE IF NOT EXISTS schools(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_pk int(6),
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            phone_number int(50),
            p_o_box int(5),
            region varchar(200),
            state varchar(200),
            date_registered timestamp DEFAULT CURRENT_TIMESTAMP,

            FOREIGN KEY(user_pk) REFERENCES users(id)
        );" -->
<!-- 
     // for lecute table
CREATE TABLE IF NOT EXISTS lecture(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_pk int,
    sector_pk varchar(30),
    rate int(6),

    FOREIGN KEY (user_pk) REFERENCES users(id)
); 



    // for rating table

    CREATE TABLE IF NOT EXISTS rating(
        id INT(6) USIGNED AUTO_INCREMENT PRIMARY KEY,
        is_school boolean,
        user_pk int(6),
        rate int
        foreign key(user_pk) refernces users(id)
    );
-->




