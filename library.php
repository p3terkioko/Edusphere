<?php 
include("../include/config.php");

if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {

    header('Location: index.php');
} else {

    $loginName = $_SESSION['userName'];
    $loginId = $_SESSION['userId'];
    $bookId = $_GET["id"];
    $power = $_SESSION['adminType'];

    /* %%%%%%%%%%%%% START CODE SUBMIT %%%%%%%%%%%% */

    if( isset($_POST['submit']) ){

        //Name Condition
        if( isset($_POST['fullname']) && !empty($_POST['fullname'])){
    
            if(preg_match('/^[A-Za-z\s]+$/',$_POST['fullname'])){
              $name = mysqli_real_escape_string($connection,$_POST['fullname']);
            }else{
              $message_name = '<b class="text-danger text-center">Please type correct name</b>';
            }

        }else{
            $message_name = '<b class="text-danger text-center">Please fill the name field</b>';
        }

        //Categorie Condition
        if(isset($_POST["categorie_op"]) && !empty($_POST["categorie_op"])){

                $categorie_option = $_POST["categorie_op"];
        } else {
            $categorie_error = '<b class="text-danger text-center">Please select categorie option OR Insert course categorie.</b>';
        }

        // Description Condition 
        if( isset($_POST['description']) && !empty($_POST['description']) ){
            
            if(preg_match('/^[A-Za-z.\s]+$/',$_POST['description'])){
                $description = mysqli_real_escape_string($connection,$_POST['description']);
            }else{

                $message_des = '<b class="text-danger text-center">Please enter valid Description field.</b>';
            }

        }else{
            $message_des = '<b class="text-danger text-center">Please fill the Description field.</b>';
        }    

        if (isset($_FILES["file1"]["name"]) && !empty($_FILES["file1"]["name"] ) )  {

            $allowedExts = array("pdf");
            $temp = explode(".", $_FILES["file1"]["name"]);
            $extension = end($temp);
            
            if (($_FILES["file1"]["type"] == "application/pdf") && in_array($extension, $allowedExts))
            {
                if ($_FILES["file1"]["error"] > 0)
                {
                    $file_error = "Return Code: " . $_FILES["file1"]["error"];
                }else{

                    $target_dir = "books/"; 
                    $delfile = 'yes';

                    $fileName = $_FILES["file1"]["name"]; // the name of file
                    $fileTmpLoc = $_FILES["file1"]["tmp_name"]; // file name in PHP folder
                    $fileType = $_FILES["file1"]["type"];
                    $fileSize =$_FILES["file1"]["size"]; // file size in bytes 
                    // *******************New Code Start from here

                    $temp = explode(".", $_FILES["file1"]["name"]);
                     $newfilename = mysqli_real_escape_string($connection,round(microtime(true)) . '.' . end($temp));
                    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_dir . $newfilename)) {
                    
                    } else {
                        $file_error =  '<b class="text-danger">Sorry, there was an error uploading your file.';
                    }

                    //********************End code
                } 
            }else{
                $file_error = '<b class="text-danger">File is not PDF.</b>';   
            }   
        }else{
            $newfilename = $_POST['pdfValue'];
            $delfile = 'no';

        } // end else 


        // Cover Photo'''''''''''''

        if( isset($_FILES["profilePic"]["name"]) && !empty($_FILES["profilePic"]["name"]) ){
            $target_dir = "images/library/";
            $del = 'yes';
            $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
            if($check !== false) {
                
                $uploadOk = 1;
            } else {
                $message_picture  = '<b class="text-danger">File is not an image</b>';
                $uploadOk = 0;
            }
        
            // Check file size
            if ($_FILES["profilePic"]["size"] > 5000000) {
                $message_picture =  '<b class="text-danger">Sorry, your file is too large.</b>';
                $uploadOk = 0;
            }
            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $message_picture =  '<b class="text-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed</b>';
                $uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk != 0) {
                $temp = explode(".", $_FILES["profilePic"]["name"]);
                $newfilename1 = mysqli_real_escape_string($connection,round(microtime(true)) . '.' . end($temp));
                if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_dir . $newfilename1)) {
                    
                } else {
                    $message_picture =  '<b class="text-danger">Sorry, there was an error uploading your file';
                }
            }

        }else{
            $newfilename1 =  $_POST['picValue'];
            $del = 'no';
        } 


        if( ( isset($name) && !empty($name) )  && ( isset($newfilename) && !empty($newfilename) ) && (isset($categorie_option) && !empty($categorie_option)) && ( isset($description) && !empty($description) ) && ( isset($newfilename1) && !empty($newfilename1) ) ){

                $insert_query = "UPDATE `library` SET
                name = '$name', 
                categorieId = '$categorie_option',  
                description = '$description', 
                book = '$newfilename',
                image = '$newfilename1' 
                WHERE id = '$bookId' ";

                if(mysqli_query($connection, $insert_query)){
                    
                    if($del == 'yes'){
                    $base_directory = "images/library/";
                    if(unlink($base_directory.$_POST['picValue']))
                    $delVar = " ";
                }

                if($delfile == 'yes'){
                    $base_directory = "books/";
                    if(unlink($base_directory.$_POST['pdfValue']))
                    $delVar = " ";
                }
                   
                    header('Location: library.php?back=2');
                }else{
                    $submit_message = '<div class="alert alert-danger">
                        <strong>Warning!</strong>
                        You are not able to submit please try later
                    </div>';
                }
    

    }else{
        $submit_message = '<div class="alert alert-danger">
                        <strong>Warning!</strong>
                        You are not able to submit please try later
                    </div>';
    }
    }

} // end of submission 

   /* %%%%%%%%%%%%% END CODE SUBMIT %%%%%%%%%%%% */


if(isset($_GET['id'])){

    $bookId = $_GET["id"];

    if( $power == 'yes') {

       $query = "SELECT * FROM `library` WHERE id='$bookId' ";

        $result = mysqli_query($connection,$query);

        if(mysqli_num_rows($result) > 0){
              while( $row = mysqli_fetch_assoc($result) ){

            $bookName = $row["name"];
            $bookDescription = $row["description"];
            $bookCategorie = $row["categorieId"];
            $bookPdf = $row["book"];
            $coverPic = $row["image"];
        
         }
        }
    }else header('Location: library.php?back=1');    

} else header('Location: library.php?back=1');



include('header.php');

 ?>

<!-- Page Sub Menu
		============================================= -->
		<div id="page-menu">

			<div id="page-menu-wrap">

			</div>

		</div><!-- #page-menu end -->


		<section id="content">

			<div class="content-wrap" id="start">

			<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="nobottommargin clearfix">

					<?php if(isset($_POST['categorie_op'])){

					 	$newOp = $_POST['categorie_op'];
					 	
					 }else{
                                $newOp = "";
                            }

					 
					?>   

					<form method="post">

					    <div class="form-group">                    
                        <label> Categorie Selection</label>
                        <select class="form-control"  name="categorie_op" id="categorie_op" onchange='if(this.value != 0) { this.form.submit(); }'>
                        <option value="a">All</option>
                    <?php 
                             $query = "SELECT * FROM `categories`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option <?php if($row['id'] == $newOp) { ?> selected <?php } ?> value="<?php echo $row['id']; ?>" > <?php echo $row['categorie']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                   
                </div>	

			</form>

<?php

	if(!empty($newOp) && $newOp != 'a'){ ?>

	<table class="table table-striped table-bordered">
    <tr>
        <th>Cover</th>
        <th>Name</th>
        <th>Description</th>
        <th>Download</th>
    </tr>
    <?php

        $query = "SELECT * FROM `library` WHERE categorieId='$newOp'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
                

                echo "<td width='100px' height='100px'><img src=gotoep/images/library/".$row["image"]." width='100px' height='100px'>
                </td>";
                
                echo "<td><strong>".$row["name"]."</strong></td>";

                echo "<td>".$row["description"]."</td>";

                echo '<td width="50px"><a target="_blank" href="gotoep/books/'.$row['book']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-download-alt"></span></a></td>';             


                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>Books Are Not Available Yet...!<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="5" id="end"><div class="text-center"><a href="library.php#start" type="button" class="btn btn-sm btn-success"><span class="icon-arrow-up"></span></a></div></td>
    </tr>
</table>
		
<?php	}else{

?>


<table class="table table-striped table-bordered">
    <tr>
        <th>Cover</th>
        <th>Name</th>
        <th>Description</th>
        <th>Download</th>
    </tr>
    <?php

        $query = "SELECT * FROM `library`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";


                echo "<td width='100px' height='100px'><img src=gotoep/images/library/".$row["image"]." width='100px' height='100px'>
                </td>";
                
                echo "<td><strong>".$row["name"]."</strong></td>";

                echo "<td>".$row["description"]."</td>";

                echo '<td width="50px"><a target="_blank" href="gotoep/books/'.$row['book']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-download-alt"></span></a></td>';             


                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>Books Are Not Available Yet...!<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="5" id="end"><div class="text-center"><a href="library.php#start" type="button" class="btn btn-sm btn-success"><span class="icon-arrow-up"></span></a></div></td>
    </tr>
</table>

<?php } ?>					
					
</div>	
</div>
</div>
</section>


<?php include("footer.php"); ?>
	