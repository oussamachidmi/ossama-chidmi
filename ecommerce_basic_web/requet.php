<?php  try { $sth = $cnx->query($requet);
                      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                      foreach($result as $row) {
                        echo "<div> ". $row["ProductID"] . "</div>";
                      }
                    }catch(PDOException $e) {
                        echo "<script > alert(Connection failed: " . $e->getMessage() . ")</script>";
                      } ?>