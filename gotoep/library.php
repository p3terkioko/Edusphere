<?php

    // Watch from YouTube Video

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

						<li class="current"><a href="library.php"><i class="icon-line-align-center"></i>Library</a></li>

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

                        if(isset($message_name) || isset($file_error) || isset($submit_message) || isset($message_des) || isset($categorie_error) || isset($message_picture) ){
                            echo "<div class='alert alert-danger'>";
                            
                            echo "Please fill the form carefully and correctly<br>";
                            
                            echo "<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                            </div>";    

                        }

                 ?>
                 
						<h3>Insert Book</h3>

                        <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="fullnameId">Book Name</label>
                        <input type="text" id="fullnameId" placeholder="Full Name" name="fullname" class="form-control" title="Only lower and upper case and space" pattern="[A-Za-z/\s]+">
                        <?php if(isset($message_name)){ echo $message_name; } ?>
                    </div>
                 
                    <div class="form-group">
                        <label class="btn btn-success" for="my-file-selector">
                            <input id="my-file-selector" name="profilePic" type="file" style="display:none;" onchange="$('#upload-file-info1').html($(this).val());">
                            Cover Photo
                        </label>
                        <span class='label label-success' id="upload-file-info1"></span>
                        <?php if(isset($message_picture)){ echo $message_picture; } ?>
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
                        <label class="btn btn-success" for="my-file-selector1">
                            <input id="my-file-selector1"  name="file1" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                            Upload Book
                        </label>
                        <span class='label label-success' id="upload-file-info"></span>
                        <?php if(isset($file_error)){ echo $file_error; } ?>

                        
                        <progress id="progressBar" value="0" max="100" style="width: 300px;"></progress>
                        <h3 id="status"></h3>
                        <p id="loaded_n_total"></p>
                        
                    </div>
                    <div class="form-group">
                		<label for="descriptionId">Description</label>
                		<textarea id="descriptionId" class="form-control" 
                		 name="description"></textarea>
             		</div>
             		<?php if(isset($message_des)){ echo $message_des; } ?>
                    <div class="form-group">
                        <button name="submit" class="btn btn-block btn-success" onclick="uploadFile()" type="submit">Submit</button>
                    </div>
                </form>
                        
							

							
						

<!--%%%%%%%%%%%%%%%% HERE DISPLAY TABLE %%%%%%%%%%%%%%%%% -->
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Cover</th>
        <th>View</th>
        <th>Book</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

        $query = "SELECT * FROM `library`";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";

                echo "<td><img src=images/library/".$row["image"]." width='80px' height='80px'></td>";
                
                echo '<td><a href="view.php?libId='.$row['id']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-eye-open"></span></a></td>';             

                echo '<td><a href="books/book.php?name='.$row['book']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-eye-open"></span></a></td>';

                echo '<td><a href="updatelibrary.php?id='.$row['id']. '" type= "button" class="btn btn-primary btn-sm">
                <span class="icon-edit"></span></a></td>';
                
                echo '<td><a href="library.php?delid='.$row['id']. '" type= "button" class="btn btn-danger btn-sm">
                <span class="icon-trash2"></span></a></td>';

                echo "<tr>";  
            }
    } else {
        echo "<div class='alert alert-danger'>You have no Record<a class='close' data-dismiss='alert'>&times</a></div>";
    }
    
    // close the mysql 
        mysqli_close($connection);
    ?>

    <tr>
        <td colspan="6" id="end"><div class="text-center"><a href="library.php" type="button" class="btn btn-sm btn-success"><span class="icon-plus"></span></a></div></td>
    </tr>
</table>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  
					</div><!-- .postcontent end -->


				</div>

			</div>

		</section><!-- #content end -->

<?php include('footer.php'); 
}

?>

<script>
        
    function _(el){
        return document.getElementById(el);
    }

    function uploadFile(){
        var file = _("my-file-selector").files[0];
    //  alter(file.name+" | "+file.size+" | "+file.type);

        var formdata = new FormData();
        formdata.append("my-file-selector", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);

        ajax.open("POST", "library.php");

        ajax.send(formdata);

    }

    function progressHandler(event){
        _("loaded_n_total").innerHTML= "Upload "+event.loaded+"bytes of"+event.total;

        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value= Math.round(percent);
        _("status").innerHTML= Math.round(percent)+"% uploaded... Please wait";
    }

    function completeHandler(event){
        
        _("status").innerHTML= event.target.responseText;
        _("progressBar").value= 0;
        
    }

    function errorHandler(event){
        
        _("status").innerHTML= "Upload failed";
        
    }

    function abortHandler(event){
        
        _("status").innerHTML= "Upload aborted";
        
    }
    </script>
