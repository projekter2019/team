
<?php
include_once("./inc/database_controller.php");
$conn = OpenSQLConn();
#penzkorh_projekter
$sql = "DROP TABLE developers";
echo $conn->query($sql);
$sql = "CREATE TABLE `developers` ( id INT UNSIGNED NOT NULL AUTO_INCREMENT , username VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL , password VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL , email VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL , name VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NULL DEFAULT NULL , price INT(10) NULL DEFAULT NULL , PRIMARY KEY (id), UNIQUE username (username)) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_hungarian_ci;";
echo $conn->query($sql);
$sql = "INSERT INTO developers (username, password, email, name, price) VALUES ('gebirkas','uk1JQx3ryB9pAgJvlAwyzhRMZv46WjTeB/QeEeHZx3q8CxVHvIHtAJtMctBfEPKncoY0WYkOhQbGTMfpuOMZvK9/JXXXpuKjkUfr3RW7t6/EJIzRJVTiduy8Q9SB3vZzakKAWcDxYsYTdNDxaEdIJuHeu7KsXyMRVos6u7jl/tw=','birksgerg@yahoo.com','Birkas Gergo', '999999')";
echo $conn->query($sql);
mysqli_close($conn);
?>

