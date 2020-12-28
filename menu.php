<?php
	include("functions.php");
	

	
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Burger Menu</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Customized Burger Ordering System</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!------------------ Sidebar ------------------->
      

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Menu</li>
          </ol>

          <!-- Page Content -->
          <h1>Menu Management</h1>
          <hr>
          <p>Login or Register To order</p>

          <div class="card mb-3 border-primary">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Menu List
             

          </div>
            <div class="card-body">

            	<?php 
					$menuQuery = "SELECT * FROM tbl_menu";

					if ($menuResult = $sqlconnection->query($menuQuery)) {

						if ($menuResult->num_rows == 0) {
							echo "<center><label>No category right now.</label></center>";
						}

						while($menuRow = $menuResult->fetch_array(MYSQLI_ASSOC)) {?>

							<div class="card mb-3 border-primary">
					            <div class="card-header">

					              <i class="fas fa-chart-area"></i>
					              <?php echo $menuRow["menuName"]; ?>
  					              

					          	</div>
					            <div class="card-body">

                			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<tr>
									<td>#</td>
									<td>Item Name</td>
									<td>Price (BDT)</td>
									<td>Options</td>
								</tr>
							<?php
								$menuItemQuery = "SELECT * FROM tbl_menuitem WHERE menuID = " . $menuRow["menuID"];

								//No item in menu
								if ($menuItemResult = $sqlconnection->query($menuItemQuery)) {

									if ($menuItemResult->num_rows == 0) {
											echo "<td colspan='4' class='text-center'>No item in this category.</td>";
										}

									$itemno = 1;
									//Fetch and display all item based on their category 
									while($menuItemRow = $menuItemResult->fetch_array(MYSQLI_ASSOC)) {	?>

										<tr>
											<td><?php echo $itemno++; ?></td>
			        						<td><?php echo $menuItemRow["menuItemName"] ?></td>
			        						<td><?php echo $menuItemRow["price"] ?></td>
			        						<td>
			        							<a href="user/login.php">Login to Order</a></td>
										</tr>

									<?php
									}
								}

								else {
									die("Something wrong happened");
								}
							?>
							</table>
							</div>
					    </div>

						<?php
						}
					}

					else {
						die("Something wrong happened");
					}
				 ?>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Customized Burger Ordering System 2020</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

   
      
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <script>
    	//passing menuId to modal
    	$('#addItemModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget); // Button that triggered the modal
			  var id = button.data('menuid'); // Extract info from data-* attributes
			  var category = button.data('category');

			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this);
			  modal.find('.modal-title').text('Add new menu (' + category +')');
			  modal.find('.modal-body #menuid').val(id);
		});

		$('#editItemModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget); // Button that triggered the modal

			  var menuid = button.data('menuid'); // Extract info from data-* attributes
			  var itemid = button.data('itemid');
			  var itemname = button.data('itemname');
			  var itemprice = button.data('itemprice');

			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this);
			  modal.find('.modal-body #menuid').val(menuid);
			  modal.find('.modal-body #itemid').val(itemid);
			  modal.find('.modal-body #itemname').val(itemname);
			  modal.find('.modal-body #itemprice').val(itemprice);
		});


		$('#deleteModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget); // Button that triggered the modal
			  var id = button.data('menuid'); // Extract info from data-* attributes
			  var category = button.data('category');

			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this);
			  modal.find('.modal-body').html('Select "Delete" below will delete all <strong>'+ category +' </strong> item or menu in this category.');
			  modal.find('.modal-footer #menuid').val(id);
		});
    </script>

    <script type="text/javascript">
	    window.setTimeout(function() {
	        $(".alert").fadeTo(500, 0).slideUp(500, function() {
	            $(this).hide();
	        });
	    }, 1000);
	</script> 

  </body>

</html>