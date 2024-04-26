<?php include("header.php"); ?>


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Team</h1>
				<span>Exceptional Team</span>
			</div>

		</section><!-- #page-title end -->

		<!-- Page Sub Menu
		============================================= -->
		<div id="page-menu">

			<div id="page-menu-wrap">


			</div>

		</div><!-- #page-menu end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					
					<div class="row">

						<div class="col-md-6 bottommargin">
<?php 
        $query = "SELECT * FROM `team` WHERE name = 'Chaudhry Faheem Irfan'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){

         		$ChairmanPic = $row['image'];

         }}

?>


							<div class="team team-list clearfix">
								<div class="team-image">
									<img src="gotoep/images/team/<?php if(isset($ChairmanPic)) echo $ChairmanPic; ?>" alt="Chaudhry Faheem Irfan">
								</div>
								<div class="team-desc">
									<div class="team-title"><h4>Chaudhry Faheem Irfan</h4><span>Chairman</span></div>
									<div class="team-content">
										<p>I am software engineer with passion for teaching as well as security specialist. I have a passion for anything  digital technology related, enjoy programing and challenge of successful digital experience.</p>
									</div>	
								</div>
							</div>
						</div>

<?php 
        $query = "SELECT * FROM `team` WHERE name = 'Muhammad Saim'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
        
                        //We have data 
                        //output the data
         while( $row = mysqli_fetch_assoc($result) ){

         		$ceoPic = $row['image'];

         }}

?>

						<div class="col-md-6 bottommargin">

							<div class="team team-list clearfix">
								<div class="team-image">
									<img src="gotoep/images/team/<?php if(isset($ceoPic)) echo $ceoPic; ?>" alt="Muhammad Saim">
								</div>
								<div class="team-desc">
									<div class="team-title"><h4>Muhammad Saim</h4><span>CEO</span></div>
									
									<div class="team-content">
										<p>I am a Graphic Designer <br>Work with adobe Photoshop for 3 years, and with illustrator and after effect with 2 years. I am also Graphic instructor at EP.</p>
									</div>
								</div>
							</div>

						</div>
					</div>




					<div class="clear"></div>

					<div class="fancy-title title-border title-center">
						<h3>Team Members</h3>
					</div>

					<div id="oc-team" class="owl-carousel team-carousel bottommargin carousel-widget" data-margin="30" data-pagi="false" data-items-xs="2" data-items-sm="2" data-items-lg="4">
// Watch Code From YouTube

					</div>
					
					<div class="clear"></div>

				</div>
			</div>
		
	</section><!-- #content end -->

<?php include("footer.php"); ?>
