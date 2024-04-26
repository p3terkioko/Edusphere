<?php

    // Watch Code From Video
?>

		<!--  ===========================  Document Wrapper =========================== -->
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

                    echo $alertMessage; 

                    if(isset($update_status)) echo $update_status;

                        if(isset($message_title) || isset($message_option) || isset($message_picture) || isset($submit_message) || isset($message_con) ){
                            echo "<div class='alert alert-danger'>";
                           
                            echo "Please fill the form carefully and correctly<br>";

                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Post</h3>

                        <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="titleID1">Title</label>
                        <input type="text" id="titleID1" placeholder="Title" name="title" class="form-control">
                        <?php if(isset($message_title)){ echo $message_title; } ?>
                    </div>

                   
                <div class="form-group">                    
                        <label>Post Selection</label>
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
                    
                   
                    <div class="form-group">
                        <label for="contentID1">Post Content</label>
                        <textarea id="contentID1" class="form-control" 
                         name="content"></textarea>
                    </div>
                     <?php if(isset($message_con)) echo $message_con; ?>   
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" type="submit">Submit</button>
                    </div>
                </form>

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Post</th>
        <th>Title</th>
        <th>Post Content</th>
        <th>Post Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `blog`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
                echo "<td>".$row["id"]."</td>"; 
                if($row["status"]=='image'){

                    echo "<td><img src=images/blog/".$row["post"]." width='80px' height='80px'> </td> "; 
                 }else{ ?>


                            <td width="80" height="80"> <iframe width="80px" height="80px" src="https://www.youtube.com/embed/<?php echo $row['post']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                             </td>


                <?php }   


                echo "<td>".$row["title"]."</td> <td> ".$row["postContent"]."</td><td> ".$row["postDate"]."</td>";

                echo '<td><a href="updateblog.php?id='.$row['id'].'&admin='.$row['admin']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-edit"></span></a></td>';
                
                echo '<td><a href="blog.php?delid='.$row['id'].'&admin='.$row['admin']. '" type= "button" class="btn btn-danger btn-sm">
                <span class="icon-trash2"></span></a></td>';

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no posts.<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="7" id="end"><div class="text-center"><a href="blog.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    



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
                        <label for="linkID1">Video Link</label>
                        <input type="url" id="linkID1" placeholder="Link" name="link" class="form-control">
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