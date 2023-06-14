<?php
$host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
$dbname="quanly_sinhvien"; //tên database sẽ kết nối đến
$username = "root"; //username để kết nối đến database 
$password = ""; // mật khẩu để kết nối đến database
$pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);  // kết nối đến database. $conn gọi là đối tượng kết nối
if(!$pdo){
    die ("kết nối thất bại".mysql_error());
}
else{
    echo("pass");
}
if(!$dbname){
    die ("không tồn tại CSDL này".mysql_error());
}
else{
    echo("kết nối thành công với CSDL");
}

$sql="CREATE TABLE IF NOT EXISTS lsgd(
    STT int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NGAYGD date NOT NULL,
    LOAIGD varchar(50) NOT NULL,
    SOTIEN float NOT NULL,
    MOTA varchar(100) NOT NULL
    );
";
$stmt=$pdo->prepare($sql);
$stmt->execute();

$sql="INSERT INTO lsgd(
    STT,NGAYGD,LOAIGD,SOTIEN,MOTA
)
VALUES
(1,'6/14/2023','rút tiền',1500,'rút tiền ATM'),
(2,'6/14/2023','rút tiền',600,'rút tiền ATM'),
(3,'6/14/2023','rút tiền',700,'rút tiền ATM'),
(4,'6/14/2023','rút tiền',900,'rút tiền ATM'),
(5,'6/14/2023','rút tiền',800,'rút tiền ATM'),
(6,'7/25/2023','rút tiền',500,'rút tiền ATM');
";
//$stmt=$pdo->prepare($sql);
//$stmt->execute();

$sql = "UPDATE lsgd SET SOTIEN=1000
WHERE STT=3";
$stmt=$pdo->prepare($sql);
$stmt->execute();

$sql= "DELETE FROM lsgd WHERE STT=5";
$stmt=$pdo->prepare($sql);
$stmt->execute();
if(!$stmt){
    die ("xóa thất bại".mysql_error());;
}
else{
    echo("Success");
}

$sql="CREATE TABLE IF NOT EXISTS dssp(
    MASP char(6) NOT NULL PRIMARY KEY,
    TENSP char(50) NOT NULL,
    GIABAN float NOT NULL,
    TONKHO int NOT NULL 
    );";
$stmt=$pdo->prepare($sql);
$stmt->execute();
if(!$stmt){
    die ("create failed".mysql_error());
}
else{
    echo("Success");
}

$sql="INSERT INTO dssp(
    MASP,TENSP,GIABAN,TONKHO
)
VALUES
('SP0006','Dien thoai SamSung Galaxy A52',6500000,20);";
$stmt=$pdo->prepare($sql);
$stmt->execute();
?>