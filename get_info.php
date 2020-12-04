<?php

    include('dbConnect.php');
    include('user.php');

    $dbConnect = new dbConnect();
    $user = new user();

    $columnName = $_POST['columnName'];
    $sort = $_POST['sort'];

    $select_query = "SELECT * FROM tbl_ride ORDER BY ".$columnName." ".$sort." ";
    $result = mysqli_query($dbConnect->connect, $select_query);
    $html = '';

    while($row = mysqli_fetch_array($result))
    {
        $ride_id  = $row['ride_id'];
        $ride_date = $row['ride_date'];
        $pickup = $row['pickup'];
        $destination = $row['destination'];
        $total_distance = $row['total_distance'];
        $luggage = $row['luggage'];
        $total_fare = $row['total_fare'];

        $html .= "<tr>
            <td>". $ride_id ."</td>
            <td>". $ride_date ."</td>
            <td>". $pickup ."</td>
            <td>". $destination ."</td>
            <td>". $total_distance ."</td>
            <td>". $luggage ."</td>
            <td>". $total_fare ."</td>
        </tr>";
    }
    echo $html;
?>