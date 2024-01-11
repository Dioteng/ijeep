  <?php
                    
                        $sql = "SELECT * FROM conductors WHERE email='" . $_SESSION["email"] . "'";
                         $query = mysqli_query($connect, $sql);
                         $querycheck = mysqli_num_rows($query);
                         $row = mysqli_fetch_assoc($query);
                          echo $row['conductor_id'];
?>