
<?php 
	
	if(isset($_GET['id'])){

		$courseId = $_GET['id'];

	} else {
		header("Location: course.php");
	}


include("header.php"); ?>

<!-- Page Sub Menu
		============================================= -->
		<div id="page-menu">

			<div id="page-menu-wrap">


			</div>

		</div><!-- #page-menu end -->


		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

 

				// Watch Code From Video 1

					<!-- Post Content
					============================================= -->
				<div class="nobottommargin clearfix">

				<div class="row">	
					<div class="">
						<div class="col-xs-6 col-sm-3">		
    						<div class="thumbnail">
      							<img src="gotoep/images/instructor/<?php echo $teacherPic; ?>" alt="Instructor">
      								<div class="caption">
        							<h3><?php echo $teacherName; ?></h3>
        							
      							</div>
    						</div>
  						
						</div>
				 		<!-- Thumnail -->

				
						<div class="col-md-9">
							<div class="panel panel-default">
  
  								<!-- Default panel contents -->
  								<div class="panel-heading">About</div>
  								<div class="panel-body">
    								<p><?php echo $teacherDes; ?></p>
  								</div>

  								<!-- Table -->
  								<table class="table table-bordered">
 						  		 <tr>
 						  		 	<th class="active" style="width: 50px;">Qualification</th>
 						  		 	<td><?php echo $teacherQ; ?></td>
 						  		 </tr>

 						  		 <tr>
 						  		 	<th class="active" style="width: 50px;">Email</th>
 						  		 	<td><?php echo $teacherMail; ?></td>
 						  		 </tr>

 						  		 <tr>
 						  		 	<th class="active" style="width: 50px;">Book</th>
 						  		 	
 						  		 	<td><a href="courselibrary.php?BookId=<?php echo $book; ?>" type= "button" class="btn btn-primary btn-sm">
                					<span class="icon-eye-open"></span></a></td>
 						  		 </tr>

  								</table>
					
							</div>
						</div>
					</div>	
				</div>

				<div class="section notopmargin notopborder">
					<div class="container clearfix">
						<div class="heading-block center nomargin">
							<h3><?php echo $courseName; ?></h3>
						</div>
					</div>
				</div>

			// Watch Video For Code 2

</div>
</div>
</div>
</section>

<?php include("footer.php"); ?>