<?php
    require_once 'db.php';

    function display_data(){
        global $con;
        $query = 'select * from deliveryreport';
        $result = mysqli_query($con, $query);
        return $result;
    }

    function display_data2(){
        global $con;
        $query2 = 'select * from stockreceipt';
        $result2 = mysqli_query($con, $query2);
        return $result2;
    }

    function display_data3(){
        global $con;
        $query3 = 'select * from customerlist';
        $result3 = mysqli_query($con, $query3);
        return $result3;
    }
    function display_data4(){
        global $con;
        $query4 = 'select * from orders';
        $result4 = mysqli_query($con, $query4);
        return $result4;
    }
?>
