
<?php

    // Watch from YouTube

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

						<li><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

						<li><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

						<li><a href="blog.php"><i class="icon-blogger"></i>Blog</a></li>

						<li><a href="library.php"><i class="icon-line-align-center"></i>Library</a></li>

						<li class="current"><a href="instructors.php"><i class="icon-guest"></i>Instructors</a></li>

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
 

                        if(isset($message_name) || isset($message_picture) || isset($message_picture) || isset($submit_message) || isset($message_q) || isset($message_des) || isset($message_ph)){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Update Instructor</h3>

                        <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="fullnameId1">Full Name</label>
                        <input type="text" id="fullnameId1" placeholder="Full Name" value="<?php if(isset($teacherName)) echo $teacherName; ?>" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>

                    <div class="form-group">
                        <label for="emailId1">Email</label>
                        <input type="email" id="emailId1" placeholder="Email" value="<?php if(isset($teacherMail)) echo $teacherMail; ?>" name="email" class="form-control" title="someone@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <?php if(isset($message_email)){ echo $message_email; } ?>
                    </div>

                    <div class="form-group">
                    <img src="images/instructor/<?php if(isset($teacherPic)) echo $teacherPic; ?>" width="100px" height="100px">
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
                        <label for="qualificationid1">Qualifications</label>
                        <input type="tex" id="qualificationid1" placeholder="Qualifications" value="<?php if($teacherqualification) echo $teacherqualification; ?>" name="qualification" class="form-control">
                        <?php if(isset($message_q)){ echo $message_q; } ?>
                    </div>

                    <div class="form-group">
                        <label for="phoneId1">Phone</label>
                        <input type="text" id="phoneId1" placeholder="Phone" value="<?php if(isset($teacherPhone)) echo $teacherPhone; ?>" name="phone" class="form-control">
                        <?php if(isset($message_ph)){ echo $message_ph; } ?>
                    </div>

                    <div class="form-group">
                		<label for="descriptionId1">Description</label>
                		<textarea id="descriptionId1" placeholder="Description" class="form-control"
                		 name="description"><?php if(isset($teacherdes)) echo $teacherdes; ?></textarea>
             		</div>
             		<?php if(isset($message_des)){ echo $message_des; } ?>
                    <input type="hidden" value="<?php if(isset($teacherPic)) echo $teacherPic; ?>" name="picValue"/>
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