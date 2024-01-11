  <?php
                    
                $sql = "SELECT drivers.lastname as driver_assigned FROM jeep 
                LEFT JOIN drivers ON jeep.driver_assigned=drivers.driver_id
                WHERE jeep.conductor_assigned ='" . $_SESSION["conductor_id"] . "'";

                         $query = mysqli_query($connect, $sql);
                         $querycheck = mysqli_num_rows($query);
                         $row = mysqli_fetch_assoc($query);
                            echo $row['driver_assigned'];

?>

