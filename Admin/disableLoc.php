<?php
    include("../dbConnect.php");

    $dbConnect = new dbConnect();

    if(isset($_GET['id']))
    {  
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_location WHERE id = $id";
        $result = mysqli_query($dbConnect->connect, $query);

        if($result ->num_rows>0)
        {
            $row = $result->fetch_assoc();
          
            if($row['is_available'] == 1)
            {
                $sql = "UPDATE tbl_location SET is_available = '0' WHERE id = $id";
                $result = mysqli_query($dbConnect->connect, $sql);
                header("Location:locationL.php");
            }
            else
            {
                $sql = "UPDATE tbl_location SET is_available = '1' WHERE id = $id";
                $result = mysqli_query($dbConnect->connect, $sql);
                header("Location:UlocationL.php");
            }
        }
    }
?>