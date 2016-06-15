<?php
    session_start();
    if(@$_SESSION["login"]!=true)
    {
        echo"
        <script type='text/javascript'>
            alert('请登录后再进行后续操作');
            window.location.href='index.php';
        </script>
        ";
        exit;

    }
    include "conn.php";
    $id=@$_GET["id"];
    $str="SELECT * FROM goods WHERE ID='$id'";
    $result=query($str);
    $row=mysql_fetch_assoc($result);
    var_dump($row);



?>