
<?php

    // Watch Code From Video
?>

		<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<div id="vertical-nav">
			<div class="container clearfix">

				<nav>
					<ul>
						<li><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                        <li><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li>
                        
						<li class="current"><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

						<li><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

						<li><a href="blog.php"><i class="icon-blogger"></i>Blog</a></li>

						<li><a href="library.php"><i class="icon-line-align-center"></i>Library</a></li>

						<li><a href="instructors.php"><i class="icon-guest"></i>Instructors</a></li>

                        <li><a href="team.php"><i class="icon-users"></i>Team</a></li>

                        <li><a href="logout.php"><i class="icon-line-power"></i>Logout</a></li>    

					</ul>
				</nav>

			</div>
		</div>

				<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
			</div>

			<div id="page-menu-wrap">

				<div class="container clearfix">

				
				</div>

			</div>

		</section><!-- #page-title end -->

		<!-- Page Sub Menu
		============================================= -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
				<!-- ========================================== -->

				<div class="postcontent nobottommargin">

                    

                <?php

                    echo $alertMessage; 
                    if(isset($update_status)) echo $update_status;

                        if(isset($message_name) || isset($message_picture) || isset($submit_message) || isset($message_des) || isset($categorie_error) || isset($instructor_error) || isset($book_error) ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Course</h3>

                        <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameID">Course Name</label>
                        <input type="text" id="nameID" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div class="form-group">                    
                        <label>Book Selection</label>
                        <select class="form-control"  name="book_op">
                        <option value="">Select Option</option>
                    <?php 
                             $query = "SELECT * FROM `library`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option value="<?php echo $row['id']; ?>" > <?php echo $row['name']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($book_error)) echo $book_error; ?>
                </div>

                    <div class="form-group">                    
                        <label>Categorie Selection</label>
                        <select class="form-control"  name="categorie_op">
                        <option value="">Select Option</option>
                    <?php 
                             $query = "SELECT * FROM `categories`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option value="<?php echo $row['id']; ?>" > <?php echo $row['categorie']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($categorie_error)) echo $categorie_error; ?>
                </div>

                <div class="form-group">                    
                        <label>Instructor Selection</label>
                        <select class="form-control"  name="ins_op">
                        <option value="">Select Option</option>
                    <?php 
                             $query = "SELECT * FROM `teacher`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option value="<?php echo $row['id']; ?>" > <?php echo $row['name']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($instructor_error)) echo $instructor_error; ?>
                </div>

                    <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Profile Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>

                    <div class="form-group">
                        <label for="descriptionId1">Description</label>
                        <textarea id="descriptionId1" class="form-control" 
                         name="description"></textarea>
                    </div>
                    <?php if(isset($message_des)){ echo $message_des; } ?>

                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>
                        
							

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Cover Picture</th>
        <th>Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `course`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
echo "<td>".$row["id"]."</td> <td><img src=images/courses/".$row["cover"]." width='80px' height='80px'> </td> <td>".$row["name"]."</td>";
                
                 echo '<td><a href="view.php?courseId='.$row['id']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-eye-open"></span></a></td>';

                echo '<td><a href="updatecourses.php?id='.$row['id']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-edit"></span></a></td>';
                
                echo '<td><a href="courses.php?delid='.$row['id']. '" type= "button" class="btn btn-danger btn-sm">
                <span class="icon-trash2"></span></a></td>';

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no Courses.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="6" id="end"><div class="text-center"><a href="courses.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

                	</div><!-- .postcontent end -->

				</div>

			</div>

		</section><!-- #content end -->

<?php include('footer.php'); 
}
?>