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
$sql="CREATE TABLE IF NOT EXISTS sinhvien(
    MASV char(6) NOT NULL PRIMARY KEY,
    HOTEN nvarchar(50) NOT NULL,
    NGAYSINH datetime NOT NULL,
    LOPHOC char(6) NOT NULL,
    DIEMTB float NOT NULL
    );";
$stmt =$pdo->prepare($sql);
$stmt->execute();

$sql="INSERT INTO sinhvien(
    MASV, HOTEN, NGAYSINH, LOPHOC, DIEMTB)

    VALUES
    ('SV0001','Nguyen Thi A','12/23/2002','K56SD1',8.8 ),
    ('SV0002','Nguyen Thi B','12/20/2002','K56SD1',10.0 ),
    ('SV0003','Nguyen Thi C','12/21/2002','K56SD1',8.9 ),
    ('SV0004','Nguyen Thi D','12/22/2002','K56SD1',3.6 ),
    ('SV0005','Nguyen Thi E','12/25/2002','K56SD1',7.8 );
    ";
//$stmt=$pdo->prepare($sql);
//$stmt->execute();

$sql="UPDATE sinhvien SET DIEMTB=8.5
WHERE MASV='SV0001';";
$stmt=$pdo->prepare($sql);
$stmt->execute();

$sql="DELETE FROM sinhvien WHERE MASV='SV0003';";
$stmt=$pdo->prepare($sql);
$stmt->execute();
?>