<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page Example </title>
    <link rel="stylesheet" href="./css/staff.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
    
    <body >
    <div class="container-fluid">

<?php
////////////////////////////////////////////////////
/**
* The following PHP scripts displays all data of a staff member
*
* Code generated by Yjang Wynter (Web Developer)
* Florida Space Institute (Remote)
* University of Central Florida
*
* @author     Yjang Wynter <yjang.wynter@ucf.edu>
* @version    0.1
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
    //this selects Anna's information
    $sql = "SELECT FULL_NAME, POSITION, DEPARTMENT, PRIMARY_MAIL, PHONE_EXT, BIOGRAPHY, RESEARCH_AREAS, RESEARCH_DESCRIPTION, PROJECTS, MENTORING, PUBLICATIONS, ORCID_LINK FROM $table WHERE FULL_NAME = 'Anne Katariina Virkki'";
    $result =  $conn->query($sql);
    if(!$result > 0){
      echo "Error #". $conn->errno . " \n";
      echo $conn->error;
    } else{
    while($row = $result->fetch_assoc()){
        $name = $row['FULL_NAME'];
        $pos = $row['POSITION'];
        $dept = $row['DEPARTMENT'];
        $mail = $row['PRIMARY_MAIL'];
        $phone = $row['PHONE_EXT'];
        $bio = explode('\n\n',$row["BIOGRAPHY"]);
        $areas =explode(',', $row["RESEARCH_AREAS"]);
        $description = $row['RESEARCH_DESCRIPTION'];
        $projects = $row['PROJECTS'];
        $mentor = $row['MENTORING'];
        $pubs = explode("\r\n",$row['PUBLICATIONS']);
        $link = $row['ORCID_LINK'];
        }
    }
?>



    <section class="row col-sm-12 ">
            <div class="col-sm-1 mx-4"></div>
            <div class=" col-sm-3 card my-2 px-0 ml-4 ">

                <div class=" card-header py-0 px-0">
                    <a href="./staff.php"><img class="img-fluid card-img-top"src="./img/femaile_profile.png" width="50%"></a>
                </div>
                <div class="card-body bg-dark text-light">
                    <p class="card-title m-0 p-0 text-center"> <?php echo $name; ?> </p>
                </div>
                <div class="card-footer bg-secondary  d-flex justify-content-center align-items-center text-light">
                
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
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 p-0 mr-0 ml-5 my-3 justify-content-center">
                <div class="research-interests">
                    <div class="bg-dark text-light p-3 mt-5 mb-3 text-center">
                        <h5 class="upper">Research Areas</h5>
                    </div><?php //While loop for the interests ?>

                    <ul class="text-black bg-white p-2 m-0 list-group list-group flush">
                    <?php 
                        for($i = 0; $i < sizeof($areas); $i++){
                            ?>
                            <li class='text-center list-group-item'><?php echo $areas[$i]?></li>
                            <?php
                        }
                    ?>

                    </ul>
                
            <?php    if(strlen($link) > 5){   ?>
                        <div class="orcid-link">
                            <div class="bg-dark text-light p-3 mt-5 mb-3 mx-1 text-center">
                                <h5 class="upper">Orcid Link</h5>
                            </div>
                            <?php 
                        echo "<a href='".$link."'><li class='p-3 text-center mx-1 list-group-item'>Click here</li></a></div>";
            }?>

                   

                    </div> 
                        
                </div>        
            <div class="col-sm-1 mx-5"></div>
        </section>


        <section class="row col-sm-12">

            <div class="col-sm-1"></div>
            <div class="col-sm-10 ">
                        <div class=" bg-dark text-light p-3 mx-4 mb-2 mt-5 text-center">
                            <h5 class="upper">Biography</h5><?php //if statement for bio ?>
                        </div>
                        <?php 
                            for ($i = 0; $i < sizeof($bio); $i++){
                               echo"<p class=' my-4 py-4 px-5'>".$bio[$i]."</p>";
                            }
                        ?>
                    </div>
            <div class="col-sm-1"></div>

        </section>


            <section class="px-4 row col-sm-12">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 p-3 m-2">
                <ul role="tablist" class="nav nav-tabs list-group-flush">
                    <li class="list-group-item border bg-dark text-light p-3 text-center col-sm-3"role="presentation"><a class="text-light" href="#tab-1" role="tab" data-toggle="tab">
                        <div class="icon-box-simple">
                            <i class="icon-telescope"></i><span>Research Descriptions</span>
                        </div>
                        </a>
                    </li>

                    <li class="list-group-item border bg-dark text-light p-3  text-center col-sm-3"role="presentation" class=""><a  class="text-light" href="#tab-2" role="tab" data-toggle="tab">
                            <div class="icon-box-simple">
                                <i class="icon-telescope"></i><span>Publications</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border bg-dark text-light p-3  col-sm-3 text-center" role="presentation"><a  class="text-light" href="#tab-3" role="tab" data-toggle="tab">
                            <div class="icon-box-simple">
                                <i class="icon-puzzle"></i><span>Mentoring</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border bg-dark text-light p-3  col-sm-3 text-center" role="presentation"> <a  class="text-light" href="#tab-4" role="tab" data-toggle="tab">
                            <div class="icon-box-simple">
                                <i class="ti-files"></i><span>Projects</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" role="tabpanel" class="tab-pane active my-4 py-3">
                    <?php //if statement for description ?>
                        <p class="px-4"><?php 
                        if(strlen($description)> 1){
                            echo $description;
                        }else{
                                echo "No research description available";}
                                ?></p>
                    </div>
                    <div id="tab-2" role="tabpanel" class="tab-pane my-4 p-3">
                    
                        <ul class="timeline px-4">
                            
                            <?php for ($i = 0; $i < sizeof($pubs); $i++){
                                //Not the best way, but need some kind of flag for the string to detect a different title
                                if($pubs[$i] == "Peer-reviewed first-author publications" || $pubs[$i] == "Co-authored peer-reviewed publications"){
                                    echo "<h4 class=' py-1 '>".$pubs[$i]."</h4><br>";
                                } elseif($pubs[$i] == ''){
                                    echo "<br>";
                                } else {
                               echo"<li class='mx-3 py-2 '>".$pubs[$i]."</li><br>";
                            } }?>
                          

                        </ul><!-- end of timeline-->

                        <!-- -->
                    </div>
                    <div id="tab-3" role="tabpanel" class="tab-pane my-4 p-3">
                    <?php //if statement for mentors 
                     if(strlen($mentor) > 5){  
                         
                     echo "<p>".$mentor."</p>";
                    } else{
                        echo "This staff does not have a mentorship history";}?>
                    </div>
                    <div id="tab-4" role="tabpanel" class="tab-pane my-4 p-3">
                    <p> <?php 
                    
                    if(strlen($projects) > 5){  
                         
                        echo "<p>".$projects."</p>";
                       } else{
                           echo "This staff does not have any projects";}
                    ?></p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-1"></div> 
            </section>
            <!-- end of row-->
     
        <!-- End of Section -->
   
        <!-- end of container-->
           

        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>