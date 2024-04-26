
<?php

    // Watch Code from Update
?>

		<!-- ========================= Document Wrapper ==================== -->
	<div id="wrapper" class="clearfix">

		<div id="vertical-nav">
			<div class="container clearfix">

				<nav>
					<ul>
						<li><a href="home.php"><i class="icon-home2"></i>Home</a></li>

                        <li><a href="categorie.php"><i class="icon-book2"></i>Categories</a></li>
                        
						<li><a href="courses.php"><i class="icon-book3"></i>Courses</a></li>

						<li><a href="content.php"><i class="icon-line-content-left"></i>Content</a> </li>

						<li class="current"><a href="blog.php"><i class="icon-blogger"></i>Blog</a></li>

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
   
                        if(isset($message_title) || isset($message_option) || isset($message_picture) || isset($submit_message) || isset($message_con) ){
                            echo "<div class='alert alert-danger'>";
                            

                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Update Post</h3>

                        <form action="" method="post" enctype="multipart/form-data">
                        
                    <div class="form-group">
                        <label for="titleId1">Title</label>
                        <input type="text" id="titleId1" value="<?php echo $title; ?>" placeholder="Title" name="title" class="form-control" >
                        <?php if(isset($message_title)){ echo $message_title; } ?>
                    </div>

                   
                <div class="form-group">                    
                        <label for="contentsel">Post Selection</label>
                        <select class="form-control"  name="contentsel" id="contentsel" onchange="showinput()">
                        <option value="">Select Option</option>
                    <?php 
                             $select = ["video","image"];
                             foreach ($select as $value) {
                    ?>

                    <option value="<?php echo $value; ?>" > <?php echo $value; ?>  </option>

                    <?php       
                        }
                    ?>

                </select>
            </div>
            <?php if(isset($message_option)) echo $message_option; ?>

                    <div id="data">
    

                    </div>
                   
                   <?php

                   if($status=='image'){ ?> 


                    <img src="images/blog/<?php echo $post; ?>" width="80px" height="80px">
                 <?php  }else{ ?>

                   <table><tr><td width="100px" height="100"><iframe width="80px" height="80px" src="https://www.youtube.com/embed/<?php echo $row['post']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td></tr></table>

                  <?php }

                   ?> 
                   

                    <div class="form-group">
                        <label for="contentId1">Post Content</label>
                        <textarea id="contentId1" class="form-control" 
                         name="content"><?php echo $content; ?></textarea>
                    </div>
                     <?php if(isset($message_con)) echo $message_con; ?>   

                    <input type="hidden" value="<?php if(isset($status)) echo $status; ?>" name="valueHide1" />                    
                    <input type="hidden" value="<?php if(isset($adminPost)) echo $adminPost; ?>" name="adminPost" />

                    <input type="hidden" value="<?php if(isset($post)) echo $post; ?>" name="valueHide" />
                     
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>
                        
				

					</div><!-- .postcontent end -->


				</div>

			</div>

		</section><!-- #content end -->


<script>
function showinput(){
    var select = document.getElementById('contentsel');
    select = select.value;
        if(select=='video')
        {
            document.getElementById('data').innerHTML =  
            `<div class="form-group">
                        <label for="link">Video Link</label>
                        <input type="text" placeholder="Link" name="link" class="form-control">
                    </div>
                    <?php if(isset($message_picture)){ echo $message_picture; } ?>`;
        } else if(select=='image'){
            document.getElementById('data').innerHTML =  
            `<div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Profile Picture
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
                    </div>`;
        } else {
            document.getElementById('data').innerHTML =  
            ``;
        }

    } 
</script>




<?php include('footer.php'); 

}

?>


