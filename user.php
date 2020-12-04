<?php
    session_start();    
    class user
    {
        function signup($username, $name, $mobile, $password, $repassword, $connect)
        {
            if($password != $repassword)
            {
                return 'Enter Same Password';
            }
            $sql = "SELECT * FROM tbl_user";
            $result = mysqli_query($connect,$sql);

            if($result->num_rows >0)
            {
                while($row=$result->fetch_assoc())
                {
                    $_SESSION['user']=array('username'=>$row['user_name'], 'isblock'=>$row['is_block']);

                    $trimed_username = trim($username);
                    $strtolower = strtolower($trimed_username);
                    
                    if($_SESSION['user']['username'] == $strtolower)
                    {
                        return "Enter Unique User Name";
                    }
                }
            }

            $insert = "INSERT INTO tbl_user(`user_name`, `name`, `dateofsignup`, `mobile`, `is_block`, `password`, `is_admin`) VALUES('$username', '$name', NOW(), '$mobile', 0, MD5('$password'), 0)";

            if($connect ->query($insert) === TRUE)
            {
                // echo "New Record Added Successfully";
                header("Location:login.php");
            }
            else
            {
                echo "failed";
            }  
            $connect->close();
        }

        function login($username, $password, $connect)
        {
            $insert = "SELECT * FROM tbl_user WHERE `user_name` = '".$username."' AND `password` = MD5('$password') ";
            $result = $connect ->query($insert);
            // print_r($result);
 
            if ($result->num_rows >0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $_SESSION['userdata'] = array('userid'=>$row['user_id'], 'username'=>$row['user_name'], 'name'=>$row['name'], 'dateofsignup'=>$row['dateofsignup'], 'mobile'=>$row['mobile'], 'isblock'=>$row['is_block'], 'password'=>$row['password'], 'isadmin'=>$row['is_admin']);
                    if($_SESSION['userdata']['isadmin'] == 1)
                    {
                    //echo "admin";
                        header("Location: Admin/index.php");
                    } 
                    elseif($_SESSION['userdata']['isblock'] == 1)
                    {
                        header('Location: customerDash.php');
                    }
                    elseif(isset($_SESSION['ride']))
                    {
                        header('Location: customerDash.php'); 
                    } 
                    else
                    {
                        echo "<h1>Admin will let you IN Soon.</h1>";
                    }
                }
            } 
            else 
            {
            // $error[] = array('input' => 'form' , 'msg' => 'INVALID LOGIN DETAILS');
            return '<script>alert("INVALID LOGIN DETAILS")</script>'; 
            }
            $connect->close(); 
        }
    
        function update($username, $name, $mobile, $connect)
        {
            $sql = "SELECT * FROM tbl_user ";
                
            $result= mysqli_query($connect,$sql);
    
            $x = $_SESSION['userdata']['userid'];
    
            $update = "UPDATE tbl_user SET `name` = '$name', `mobile` = '$mobile' WHERE user_id = $x";
                
            if($connect ->query($update) === TRUE)
            {
                // echo "New Record Added Successfully";
                header("Location: customerDash.php");
            }
        }

        function changepassword($username, $name, $mobile, $previouspassword, $password, $repassword, $connect)
        {
            $checkpassword = $_SESSION['userdata']['password'];

            if(md5($previouspassword) == $checkpassword)
            {
                if($password != $repassword)
                {
                    //$error[] = array('input' => 'password', 'msg' => 'PASSWORD DONT MATCH');
                    echo "Enter Same Password";
                }
    
                $sql = "SELECT * FROM tbl_user ";
                
                $result= mysqli_query($connect,$sql);
    
                $x = $_SESSION['userdata']['userid'];
                $update = "UPDATE tbl_user SET `password` = MD5('$password') WHERE user_id = $x";
                
                if($connect ->query($update) === TRUE)
                {
                    // echo "New Record Added Successfully";
                    unset($_SESSION["userdata"]);
                    header("Location: login.php");
                }
            }
            else
            {
                echo "Previous Password Not Matched";
            }
        }

        function ride($pickup, $drop, $luggage, $fare, $distance, $connect)
        {
            $sess_distance = $_SESSION['ride']['distance'];

            $x = $_SESSION['userdata']['userid'];
            
            $alpha = "INSERT INTO `tbl_ride`(`ride_date`, `pickup`, `destination`, `total_distance`, `luggage`, `total_fare`, `status`, `user_id`) VALUES(current_timestamp(), '$pickup', '$drop', '$sess_distance', '$luggage', '$fare', 1, '$x')";
            
            if($connect->query($alpha) === TRUE)
            {
                header('Location: customerDash.php');
            }
            else
            {
                echo "failed";
            }
        }  

        function show_location($connect)
        {
            $sql = "SELECT * from `tbl_location` WHERE `is_available`= 1 ";
            $result = $connect->query($sql);

            if ($result->num_rows > 0)    
            {
                while ($row= $result->fetch_assoc()) 
                {
                    $show = '<option value='.$row['name'].'>' .$row['name'].'</option>';
                    echo $show;
                }         
            }
        }

        function total_fare($connect)
        {
            $user_id = $_SESSION['userdata']['userid'];

            $sql1 = "SELECT * FROM tbl_ride WHERE `user_id`='".$user_id."'";

            $result = $connect->query($sql1);
            if ($result->num_rows >0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                  $abc = $row['user_id'];
                }
            }
            $sql = "SELECT SUM(total_fare) As Total from tbl_ride WHERE user_id ='".$abc."'"; 
            $result=$connect->query($sql);
            $row= $result->fetch_assoc();
            echo 'Rs:'.$row['Total'];
        }

        function total_rides($connect)
        {
            $user_id = $_SESSION['userdata']['userid'];

            $sql1 = "SELECT * FROM tbl_ride WHERE `user_id`='".$user_id."'";

            $result = $connect->query($sql1);
            if ($result->num_rows >0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                  $abc = $row['user_id'];
                }
            }

            $sql = "SELECT COUNT(user_id) As Total from tbl_ride WHERE user_id ='".$abc."' "; 
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            echo $row['Total'];
        }

        function pending_rides($connect)
        {
            $user_id = $_SESSION['userdata']['userid'];

            $sql1 = "SELECT * FROM tbl_ride WHERE `user_id` = '".$user_id."'";

            $result = $connect->query($sql1);
            if ($result->num_rows >0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                  $abc = $row['user_id'];
                }
            }
            $sql = "SELECT COUNT(status) As Total from tbl_ride WHERE user_id ='".$abc."' AND `status` = 1"; 
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            echo $row['Total'];
        }

        function filter($a,$filter,$connect)
        {
            if($filter==7)
            {  
                $sql="SELECT * FROM tbl_ride ORDER BY `ride_date` DESC";
                $result=$connect->query($sql);
                if ($result->num_rows > 0) 
                {
                    while ($row= $result->fetch_assoc()) 
                    {
                        $a.='<td style="padding: 15px">'.$row['user_id'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['user_name'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['name'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['dateofsignup'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['mobile'].'</td></tr>';
                    }
                    $a.='</table>';
                    echo $a;
                }
            }

            if($filter==30)
            {
                $sql="SELECT * FROM tbl_user
                ORDER BY `dateofsignup` DESC
                LIMIT 0, 30";
                $result=$connect->query($sql);

                if ($result->num_rows > 0) 
                {     
                    while ($row= $result->fetch_assoc()) 
                    {
                        $a.='<td style="padding: 15px">'.$row['user_id'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['user_name'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['name'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['dateofsignup'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['mobile'].'</td></tr>';
                    }
                    $a.='</table>';
                    echo $a;
                }
            }

            if($filter==1)
            {
                $sql="SELECT * FROM tbl_ride
                ORDER BY total_fare ASC";
                $result=$connect->query($sql);
                if ($result->num_rows >0) 
                {
                    while ($row= $result->fetch_assoc()) 
                    {
                        $a.='<td style="padding: 15px">'.$row['ride_id'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['ride_date'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['pickup'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['destination'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['total_distance'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['total_fare'].'</td>';
                        $a.='<td style="padding: 15px">'.$row['luggage'].'</td></tr>';
                    }
                    $a.='</table>';
                    echo $a;
                }
            }
        }
    }
?>