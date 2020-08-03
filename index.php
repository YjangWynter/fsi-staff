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
<style>
    @media screen and (max-width:399px){
        .text-sm-left {
            font-size: 0.77rem;
        }
    }
</style>
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
* @version    0.1.2
* 
*/
///////////////////////////////////////////////////////

$servername = "localhost"; // DB Server Host
$username  = "root"; //DB User
$password  = ""; // DB Password
$database  =  "fsi"; //Database name
$table = "science_staff_3";
$conn = new mysqli($servername, $username, $password,$database); // SQL Database Connector
//PDO
if (!$conn) {
    die('No pudo conectarse: ' . $conn->error($e)); // Failed to Connect
    }

    
    $sql = "SELECT ID, FULL_NAME, IMAGE, POSITION, DEPARTMENT, PRIMARY_EMAIL, PHONE_EXT, CATEGORIES, ORCID_LINK FROM $table ORDER BY FULL_NAME";
    $result =  $conn->query($sql);
    if(!$result > 0){
      echo "Error #". $conn->errno . " \n";
      echo $conn->error;
    } else{
        ?>        
        <div class="container-fluid justify-content-start   row col-sm-12 m-auto  h-100 filter">
             <div class="p-5 m-auto col-sm-2"></div>

            <div class="py-4 my-4 control-panel col-sm-8 bg-dark text-light">
                <div class="filter-title text-center" >
                    <h4>Filter Control Panel</h4>
                </div>
                <div class="filter-controls  col-sm-12 mx-3">
                    <div class="filter-category position row my-4 " >
                        <div class="filter-title bg-light text-dark px-5 py-1 mb-2">
                            <h5>Position</h5>
                        </div>
                            <div class="input-group  mx-3 form-check-inline ">
                                <div class="col-sm-12 row my-2">
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="observatory" id="observatory">
                                            </div>
                                            <div class="input-group-append mx-1">Observatory Scientist</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="senior" id="senior">
                                            </div>
                                            <div class="input-group-append mx-1">Senior Scientist</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="postdoctoral" id="postdoctoral">
                                            </div>
                                            <div class="input-group-append mx-1">Postdoctoral</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="operations" id="operations">
                                            </div>
                                            <div class="input-group-append mx-1">Science Operations Associate</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="other" id="otherTitle">
                                            </div>
                                            <div class="input-group-append mx-1">Other</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="filter-category areas row my-4">
                        <div class="filter-title  bg-light text-dark px-3 py-1 mb-2">
                            <h5>Research Areas</h5>
                        </div>
                        <div class="input-group row mx-3 form-check-inline">
                            <div class="col-sm-12 row my-2">
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="planets" id="planets">
                                            </div>
                                            <div class="input-group-append mx-1">Planets</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="radar" id="radar">
                                            </div>
                                            <div class="input-group-append mx-1">Radar</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="asteroids" id="asteroids">
                                            </div>
                                            <div class="input-group-append mx-1">Asteroids</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="atmosphere" id="atmosphere">
                                            </div>
                                            <div class="input-group-append mx-1">Atmosphere</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 row my-2">
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="ipa" id="ipa">
                                            </div>
                                            <div class="input-group-append mx-1">Scientific Instruments, Processes, & Applications </div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="galaxy" id="galaxy">
                                            </div>
                                            <div class="input-group-append mx-1">Galactic bodies & formations</div>
                                        </div>
                                    </div>
                                    <div class="filter-option mx-4">
                                        <div class="row">
                                            <div class="input-group-checkbox mx-1">
                                                <input type="checkbox" name="other" id="otherArea">
                                            </div>
                                            <div class="input-group-append mx-1">Other</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="p-5 m-auto col-sm-2"></div>
        </div>
      
        <div class="container-fluid justify-content-center  row col-sm-12 m-auto  h-100 results ">
                <?php 
        $count = -1; //create a counter  & first row. Set -1 to account for divde by zero error
        while($row = $result->fetch_assoc()){
            //set variables
            $name = $row['FULL_NAME'];
            $id = $row['ID'];
            $image = $row['IMAGE'];
            $pos = $row['POSITION'];
            $dept = $row['DEPARTMENT'];
            $mail = $row['PRIMARY_EMAIL'];
            $phone = $row['PHONE_EXT'];
            $categories = $row['CATEGORIES'];
            $link = $row['ORCID_LINK']; 
            
            //remove comma from the string in categories to place as a class in entries
            $categories = explode(",",$categories);
            $categories = implode(" ", $categories);
            
            //titles of staff
            $title;
            //define class of entry based on their title
            $postDoc = "postdoctoral";
            $obsSci = "observatory";
            $topSci = "senior";
            $sciOps = "operations";
            if ($pos !== NULL){
                if (stripos($pos, $postDoc) !== false){
                    $title = $postDoc;
                } else if (stripos($pos, $sciOps) !== false){
                    $title = $sciOps;
                } else if (stripos($pos, $topSci) !== false){
                    $title = $topSci;
                } else if (stripos($pos, $obsSci) !== false){
                    $title = $obsSci;
                } else {
                    $title = " ";
                }
            }
             // prints the cards in the row 
                //Prints the first row
                //if the four or more entries exist, end the last row and create new row
                            ?>
            <div class="shadow-lg entry <?php echo "".$title." ".$categories; ?> card h-auto col-sm-3 my-2 px-0 mx-2">

               
                <a class="card-img-top" href="./profile.php?id=<?php  echo $id; ?>"> <img class="img-fluid card-img-top"src="<?php echo $image; ?>" width="50%"></a>
                

                <div class="card-header h-auto bg-dark text-light">
                <a class="text-light"  href="./profile.php?id=<?php  echo $id; ?>"> <p class="card-title m-0 p-0 text-center"> <?php echo $name; ?> </p></a>
                </div>
                <div class="card-body bg-secondary px-0  d-flex justify-content-center align-items-center text-light">
                
                    <ul style="list-style-type:none; "class="card-info px-0 col-sm-12 mx-0 px-0">
                        <li class="text-sm-left mx-3 row d-flex">
                        <span><i class="fas fa-user mx-4"></i></span>     <?php echo  nl2br($pos);; //the position of the staff?>    
                        </li>
                        <li class="text-sm-left mx-3 row">
                        <span><i class="fas fa-building mx-4"></i></span>     <?php echo  nl2br($dept);//the department of the staff ?>
                        </li>
                        <li class="text-sm-left mx-3 row ">
                        <span><i class="fas fa-envelope mx-4"></i></span>    <?php echo "<a class='text-light d-flex ' href='mailto:".$mail."'>".$mail."</a>"; // the email link of the staff?>
                        </li>
                         <?php 
                        if (isset($phone)){ ?>
                            <li class="text-sm-left mx-3 row">
                                <span><i class="fas fa-phone-alt mx-4"></i></span>Ext:   <?php echo $phone; ?>
                            </li>
                        <?php } 
                         if (isset($link)){ ?>
                            <li class="text-sm-left mx-3 row">
                            <span><a class="text-light" href=" <?php  echo $link; ?>"> <i class="fas fa fa-globe mx-4"></i></a></span>    <a class="text-light"href=" <?php echo $link;?>"><?php echo "Web";?></a>
                        </li> 
                        <?php } ?>

                                           </ul>
                </div>
            </div> <?php  

            
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