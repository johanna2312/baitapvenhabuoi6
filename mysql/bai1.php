<?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "quanly_sinhvien";

//connect
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
    echo("Có CSDL nha");
}
//create
$sql_stmt ="CREATE TABLE IF NOT EXISTS sinhvien(
    MASV char(6) NOT NULL PRIMARY KEY,
    HOTEN nvarchar(50) NOT NULL,
    NGAYSINH datetime NOT NULL,
    LOPHOC char(6) NOT NULL,
    DIEMTB float NOT NULL
    );";
$result = mysqli_query($conn,$sql_stmt);
if(!$result){
    die ("tạo bảng thất bại".mysql_error());
}
else{
    echo("Success");
}
//insert
$sql_stmt ="INSERT INTO sinhvien(
    MASV, HOTEN, NGAYSINH, LOPHOC, DIEMTB
)
    VALUES
    ('SV0001','Nguyen Thi A','12/23/2002','K56SD1',8.8 ),
    ('SV0002','Nguyen Thi B','12/20/2002','K56SD1',10.0 ),
    ('SV0003','Nguyen Thi C','12/21/2002','K56SD1',8.9 ),
    ('SV0004','Nguyen Thi D','12/22/2002','K56SD1',3.6 ),
    ('SV0005','Nguyen Thi E','12/25/2002','K56SD1',7.8 );
    ";
//update
$sql_stmt = "UPDATE sinhvien SET DIEMTB = 8.5
WHERE MASV='SV0001'";
$result = mysqli_query($conn,$sql_stmt);

//delete
$sql_stmt = "DELETE FROM sinhvien WHERE MASV='SV0003'";
$result=mysqli_query($conn,$sql_stmt);
if(!$result){
    die ("xóa thất bại".mysql_error());;
}
else{
    echo("Success");
}
?>