<?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "quanly_sinhvien";
$conn = mysqli_connect($severname,$username,$password,$database);
if(!$conn){
    die ("kết nối thất bại".mysql_error());}
else{
    echo("kết nối thành công");
}

if(!$database){
    die ("không tìm thấy CSDL".mysql_error());
}
else{
    echo("Có CSDL nha!");
}

$sql_stmt ="CREATE TABLE IF NOT EXISTS lsgd(
    STT int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NGAYGD date NOT NULL,
    LOAIGD varchar(50) NOT NULL,
    SOTIEN float NOT NULL,
    MOTA varchar(100) NOT NULL
    );";
$result = mysqli_query($conn,$sql_stmt);
if(!$result){
    die ("create failed".mysql_error());
}
else{
    echo("Success");
}
$sql_stmt="ALTER TABLE lsgd AUTO_INCREMENT=1;";
$result = mysqli_query($conn,$sql_stmt);


$sql_stmt="INSERT INTO lsgd(
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
//$result = mysqli_query($conn,$sql_stmt);
//if(!$result){
//    die ("Insert failed".mysql_error());
//}
//else{
//    echo("Insert success");
//}
$sql_stmt = "UPDATE lsgd SET SOTIEN=1000
WHERE STT=3";
$result = mysqli_query($conn,$sql_stmt);

$sql_stmt = "DELETE FROM lsgd WHERE STT=5";
$result=mysqli_query($conn,$sql_stmt);
if(!$result){
    die ("xóa thất bại".mysql_error());;
}
else{
    echo("Success");
}

$sql_stmt ="CREATE TABLE IF NOT EXISTS dssp(
    MASP char(6) NOT NULL PRIMARY KEY,
    TENSP char(50) NOT NULL,
    GIABAN float NOT NULL,
    TONKHO int NOT NULL 
    );";
$result = mysqli_query($conn,$sql_stmt);
if(!$result){
    die ("create failed".mysql_error());
}
else{
    echo("Success");
}

$sql_stmt="INSERT INTO dssp(
    MASP,TENSP,GIABAN,TONKHO
)
VALUES
('SP0006','Dien thoai SamSung Galaxy A52',6500000,20);";
//$result=mysqli_query($conn,$sql_stmt);
?>