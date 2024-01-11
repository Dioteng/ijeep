  <?php
                    
                        $sql = "SELECT * FROM jeep WHERE conductor_assigned='" . $_SESSION["conductor_id"] . "'";
                         $query = mysqli_query($connect, $sql);
                         $querycheck = mysqli_num_rows($query);
                         $row = mysqli_fetch_assoc($query);
                          echo $row['plate_num'];
?>