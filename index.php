<!-- ตอนที่ 1-2 สอนการใช้งาน PHP + MYSQL ดึงข้อมูลมาแสดงผลในตาราง -->
<?php
    //(1)Create Connection
    //4 params host, username, password, database name
    $connect = mysqli_connect('localhost','root','','milercompany');
    //Check Connection แล้วก็ลองเปิด server localhost/milerconnect/
    if (mysqli_connect_error($connect)) {
        echo 'Faild to connect to database: ' . mysqli_connect_error();
    }
    //(2) Reload => localhost/milerconnect/ , localhost/phpmyadmin/
    // mysqli_query($connect, "INSERT INTO employees (first_name,last_name,department,email)
    //                         VALUES ('suraida', 'wani', 'Programmer', 'dada@gmail.com')");
    //(3) เรียกดูข้อมูลจากตาราง
    $result = mysqli_query($connect, "SELECT * FROM employees" );
    //ถ้าทำตารางอย่างสวยงามด้านล่างก็ไม่ต้องเขียนด้านบน
    // while ($row = mysqli_fetch_array($result)) {
    //     echo $row['first_name'] . ' ' . $row['last_name'] . '<br>';
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP WITH MYSQL</title>
</head>
<body>
    <!-- (4) การทำตารางให้สวยงาม-->
    <h1>Employees</h1>
    <table width="500" cellspacing="5" cellpadding="5" border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Email</th>
        </tr>
        <!-- short hand for use direct html in php -->
        <?php while($row = mysqli_fetch_array($result)): ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['department'] ?></td>
            <td><?php echo $row['email'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <!-- ถ้า name มี เหมือนกัน วิธีแก้ต้องเพิ่ม As -->
    <?php $productresult = mysqli_query($connect, 
                                    "SELECT products.name, categories.name AS 'category', products.id AS 'prod_id'
                                     FROM products
                                     LEFT JOIN categories
                                     ON products.category = categories.id" ); ?>
    <h1>Products</h1>
    <table width="500" cellspacing="5" cellpadding="5" border="1">
        <tr>
            <th>ID</th>
            <th>Products</th>
            <th>Category</th>
        </tr>
        <!-- short hand for use direct html in php -->
        <?php while($row = mysqli_fetch_array($productresult)): ?>
        <tr>
            <td><?php echo $row['prod_id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['category'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

