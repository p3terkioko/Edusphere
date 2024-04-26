<?php include("header.php"); ?>

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

// Watch Code from Video