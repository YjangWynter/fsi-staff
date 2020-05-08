<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSI Staff Page Prototype </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid row justify-content-sm-center ">
<?php
session_start();
////////////////////////////////////////////////////
/**
* The following PHP script displays all data of staff from an SQL database,
* which then sends the user to another page which dipslay more information
*
* Code generated by Yjang Wynter (Web Developer)
* Florida Space Institute (Remote)
* University of Central Florida
*
* @author     Yjang Wynter <yjang.wynter@ucf.edu> <yjangwynter@gmail.com>
* @version    0.1.1
* 
*/
///////////////////////////////////////////////////////

$servername = "localhost"; // DB Server Host
$username  = "root"; //DB User
$password  = ""; // DB Password
$database  =  "fsi"; //Database name
$table = "science_staff";
$conn = new mysqli($servername, $username, $password,$database); // SQL Database Connector
//PDO
if (!$conn) {
    die('No pudo conectarse: ' . $conn->error($e)); // Failed to Connect
    }

    
    $sql = "SELECT ID, FULL_NAME, IMAGE, POSITION, DEPARTMENT, PRIMARY_MAIL, PHONE_EXT, ORCID_LINK FROM $table ORDER BY ID";
    $result =  $conn->query($sql);
    if(!$result > 0){
      echo "Error #". $conn->errno . " \n";
      echo $conn->error;
    } else{
        ?>        
        <div class="container-fluid justify-content-start   row col-sm-12 m-auto  h-100">
        <div class="p-5 m-auto col-sm-2"></div>

            <div class="py-4 my-4 control-panel col-sm-8 bg-dark text-light">
                <div class="filter-title text-center" >
                    <h4>Filter Control Panel</h4>
                </div>
                <div class="filter-controls col-sm-12 mx-3">
                    <div class="filter-category row my-4 " >
                        <div class="filter-title bg-light text-dark px-5 py-1 mb-2">
                            <h5>Position</h5>
                        </div>
                            <div class="input-group  mx-3 form-check-inline ">
                                <div class="col-sm-12 row my-2">
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-1" id="1">
                                            </div>
                                            <div class="input-group-append mx-1">Option 1</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-2" id="2">
                                            </div>
                                            <div class="input-group-append mx-1">Option 2</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-3" id="3">
                                            </div>
                                            <div class="input-group-append mx-1">Option 3</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-4" id="4">
                                            </div>
                                            <div class="input-group-append mx-1">Option 4</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="filter-category row my-4">
                        <div class="filter-title  bg-light text-dark px-3 py-1 mb-2">
                            <h5>Research Areas</h5>
                        </div>
                            <div class="input-group row mx-3 form-check-inline">
                            <div class="col-sm-12 row my-2">
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-1" id="1">
                                            </div>
                                            <div class="input-group-append mx-1">Option 1</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-2" id="2">
                                            </div>
                                            <div class="input-group-append mx-1">Option 2</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-3" id="3">
                                            </div>
                                            <div class="input-group-append mx-1">Option 3</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="option-4" id="4">
                                            </div>
                                            <div class="input-group-append mx-1">Option 4</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="p-5 m-auto col-sm-2"></div>
        </div>
      
        <div class="container-fluid results ">
            <!-- Browser keeps adding a closing div  below -->
            <!-- vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv -->

                <?php 
        $count = -1; //create a counter  & first row. Set -1 to account for divde by zero error
        while($row = $result->fetch_assoc()){
            //set variables
            $name = $row['FULL_NAME'];
            $id = $row['ID'];
            $image = $row['IMAGE'];
            $pos = $row['POSITION'];
            $dept = $row['DEPARTMENT'];
            $mail = $row['PRIMARY_MAIL'];
            $phone = $row['PHONE_EXT'];
            $link = $row['ORCID_LINK'];


             if (($count +1) % 3 ==0){ //Prints the new row and a card for every four entries
               //Closes the previous row ?> </div>
                <div class="row col-sm-12  mx-auto my-auto justify-content-center">
                    <div class="card h-100 col-sm-3 my-2 px-0 mx-2 px-0 ">
                        <div class=" card-header py-0 px-0">
                                    <a href="./profile.php?id=<?php  echo $id; ?>"> <img class="img-fluid card-img-top"src="<?php echo $image; ?>" width="50%"></a>
                        </div>
                        <div  class="card-body bg-dark text-light">
                            <p class="card-title h-100 m-0 p-0 text-center"> <?php echo $name; ?> </p>
                        </div>
                        <div class="card-footer h-100 bg-secondary  d-flex justify-content-center align-items-center text-light">
                        
                            <ul style="list-style-type:none;"class="col-sm-12 mx-0 px-0">
                                <li class="text-sm-left mx-3 row">
                                <span><i class="fas fa-user mx-4"></i></span>     <?php echo $pos; ?>    
                                </li>
                                <li class="text-sm-left mx-3 row">
                                <span><i class="fas fa-building mx-4"></i></span>     <?php echo $dept; ?>
                                </li>
                                <li class="text-sm-left mx-3 row">
                                <span><i class="fas fa-envelope mx-4"></i></span>    <?php echo $mail; ?>
                                </li>
                                <li class="text-sm-left mx-3 row">
                                <span><i class="fas fa-phone-alt mx-4"></i></span>Ext:    <?php echo $phone; ?>
                                </li>               
                            <li class="text-sm-left mx-3 row">
                            <span><a class="text-light" href=" <?php if (strlen($link) >0){ echo $link; }else {echo './';} ?>"> <i class="fas fa fa-globe mx-4"></i></a></span>    <a class="text-light"href=" <?php if (strlen($link) >0){echo $link; }else {echo './';}?>"><?php  if (strlen($link) >0){ echo "Web";}else{ echo "N/A";}?></a>
                        </li> 

                            </ul>
                        </div>
                    </div>
                
                <?php
            } else{  // prints the cards in the row 
                //Prints the first row
                //if the four or more entries exist, end the last row and create new row
                            ?>
                        <div class="card h-100 col-sm-3 my-2 px-0 mx-2 px-0 ">

                <div class=" card-header py-0 px-0">
                <a href="./profile.php?id=<?php  echo $id; ?>"> <img class="img-fluid card-img-top"src="<?php echo $image; ?>" width="50%"></a>
                </div>
                <div class="card-body bg-dark text-light">
                    <p class="card-title m-0 p-0 text-center"> <?php echo $name; ?> </p>
                </div>
                <div class="card-footer bg-secondary  d-flex justify-content-center align-items-center text-light">
                
                    <ul style="list-style-type:none;"class="col-sm-12 mx-0 px-0">
                        <li class="text-sm-left mx-3 row">
                        <span><i class="fas fa-user mx-4"></i></span>     <?php echo $pos; //the position of the staff?>    
                        </li>
                        <li class="text-sm-left mx-3 row">
                        <span><i class="fas fa-building mx-4"></i></span>     <?php echo $dept;//the department of the staff ?>
                        </li>
                        <li class="text-sm-left mx-3 row">
                        <span><i class="fas fa-envelope mx-4"></i></span>    <?php echo "<a class='text-light' href='mailto:".$mail."'>".$mail."</a>"; // the email link of the staff?>
                        </li>
                        <li class="text-sm-left mx-3 row">
                        <span><i class="fas fa-phone-alt mx-4"></i></span>Ext:    <?php echo $phone; //Phone extension of the staff ?>
                        </li>

                            <li class="text-sm-left mx-3 row">
                            <span><a class="text-light" href=" <?php if (strlen($link) >0){ echo $link; }else {echo './';} ?>"> <i class="fas fa fa-globe mx-4"></i></a></span>    <a class="text-light"href=" <?php if (strlen($link) >0){echo $link; }else {echo './';}?>"><?php  if (strlen($link) >0){ echo "Web";}else{ echo "N/A";}?></a>
                        </li> 

                                           </ul>
                </div>
            </div> <?php  

            } 
            $count++; // counter adds to itself to loop through the next row
        }
    
                    ?>   
        </div> 
       <?php
    }
     
    $conn->close();
?>





    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
<script src="./js/filter.js"></script>
</body>
</html>