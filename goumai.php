<?php
    session_start();
    $u_name=@$_SESSION["name"];
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
    $tm=date("Y-m-d H-i-s");
    $str="SELECT * FROM goods WHERE ID='$id'";
    $result=query($str);
    $row=mysql_fetch_assoc($result);

    if(@$row["num"]<1)
    {
        echo"
        <script type='text/javascript'>
            alert('商品已售完');
            window.location.href='index.php';
        </script>
        ";
    }
    else
    {
        $str_shop="SELECT * FROM shop WHERE userName='$u_name'";
        $shop=query($str_shop);
        $rows=mysql_fetch_assoc($shop);
        if(@$_rows["shopId"]==$id)
        {
            echo"
        <script type='text/javascript'>
            alert('该商品已在购物车中');
        </script>
        ";
        }
        else
        {
            $str_shop="INSERT INTO shop(userName,shopId,time,num)values('$u_name','$id','$tm',1)";
            $shop=query($str_shop);
        }
        $str_shop="SELECT * FROM shop WHERE userName='$u_name'";
    }?>
