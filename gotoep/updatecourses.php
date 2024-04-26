
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

                       if(isset($message_name) || isset($message_picture) || isset($submit_message) || isset($message_des) || isset($categorie_error) || isset($instructor_error) || isset($book_error) ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Update Course</h3>

                        <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nameID">Course Name</label>
                        <input type="text" id="nameID" placeholder="Full Name" value="<?php if(isset($coursename)) echo $coursename; ?>" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>


                    <div class="form-group">                    
                        <label> Book Selection</label>
                        <select class="form-control"  name="book_op">
                    <?php 
                             $query = "SELECT * FROM `library`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option <?php if($row['id'] == $coursBook) { ?> selected <?php } ?> value="<?php echo $row['id']; ?>" > <?php echo $row['name']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($book_error)) echo $book_error; ?>
                </div>


                    <div class="form-group">                    
                        <label> Categorie Selection</label>
                        <select class="form-control"  name="categorie_op">
                    <?php 
                             $query = "SELECT * FROM `categories`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option <?php if($row['id'] == $coueseCategorie) { ?> selected <?php } ?> value="<?php echo $row['id']; ?>" > <?php echo $row['categorie']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($categorie_error)) echo $categorie_error; ?>
                </div>

                <div class="form-group">                    
                        <label>Instructor Selection</label>
                        <select class="form-control"  name="ins_op">
                    <?php 
                             $query = "SELECT * FROM `teacher`";

                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
                        while( $row = mysqli_fetch_assoc($result) ){
                    ?>

                        <option <?php if($row['id'] == $courseInstr) { ?> selected <?php } ?> value="<?php echo $row['id']; ?>" > <?php echo $row['name']; ?>  </option>

                        <?php       
                            } }
                        ?>

                        </select>
                    <?php if(isset($instructor_error)) echo $instructor_error; ?>
                </div>

                    <div class="form-group">
                     <img src="images/courses/<?php if(isset($coursePic)) echo $coursePic; ?>" width="100px" height="100px">   
                    </div>
                    <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                           Change Cover Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>
                    <input type="hidden" value="<?php if(isset($coursePic)) echo $coursePic; ?>" name="picValue" />


                    <div class="form-group">
                        <label for="descriptionId1">Description</label>
                        <textarea id="descriptionId1" class="form-control" 
                         name="description"><?php if(isset($courseDescription)) echo $courseDescription; ?></textarea>
                    </div>
                    <?php if(isset($message_des)){ echo $message_des; } ?>
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>
                        
	
                	</div><!-- .postcontent end -->

				</div>

			</div>

		</section><!-- #content end -->

<?php include('footer.php'); 

}

?>