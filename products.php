
<?php 
  include 'header.php';
 ?>
<!-- Trigger the modal with a button -->
			<a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Add</a>
			<br>
			<table class="table table-bordered table-striped" id="product-table">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Code</th>
						
						<th>Description</th>
					<th>Price</th>
						<th>Status</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<!-- Add Product -->
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span>New Product</h4>
						</div>
						<div class="modal-body">
							<form id="add-product-form" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="name">Product Name</label>
									<input type="text" class="form-control" name="product_name" id="name" required>
								</div>
								<div class="form-group">
									<label for="code">Product Code</label>
									<input type="text" class="form-control" name="product_code" id="code">
								</div>
								<div class="form-group">
									<label for="price">Price</label>
									<input type="text" class="form-control" name="price" id="price">
								</div>
								<div class="form-group">
									<label for="description">Description</label>
									<textarea class="form-control" name="description" id="description"></textarea>
								</div>
								<div class="form-group">
									<label for="description">Status</label>
									<textarea class="form-control" name="status" id="status"></textarea>
								</div>
								
								<div class="form-group">
									<label for="fileToUpload">Image</label>
									<input type="file" name="fileToUpload" id="fileToUpload">
									<img src="#" id="image-preview" style="height: 150px"a>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" id="add-btn">Add</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End Add Product -->
			<!-- Update Product -->
			<!-- Modal -->
			<div id="update" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<form id="update-product-form" enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><span class="glyphicon glyphicon-pencil"></span>Edit</h4>
							</div>
							<div class="modal-body">
								
								<input type="hidden" name="id" id="uid">
								<div class="form-group">
									<label for="name">Product Name</label>
									<input type="text" class="form-control" name="product_name" id="uname" required>
								</div>
								<div class="form-group">
									<label for="code">Product Code</label>
									<input type="text" class="form-control" name="product_code" id="ucode">
								</div>
								
								<div class="form-group">
									<label for="description">Description</label>
									<textarea class="form-control" name="description" id="udescription"></textarea>
								</div>
								<div class="form-group">
									<label for="price">Price</label>
									<input type="text" class="form-control" name="price" id="uprice">
								</div>
								<div class="form-group">
									<label for="status">Status</label>
									<input type="text" class="form-control" name="status" id="ustatus">
								</div>
							
								<div class="form-group">
									<label for="uimage-preview">Image</label>
									<img src="#" id="uimage-preview" style="width:50px">
									 <img src="<?php echo $row["image"]; ?>" alt="">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success" id="usave-btn" style="width: 20%">Save</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- End Update Product -->
			<!-- Delete Product -->
			<div id="delete" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<form id="delete-product-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span>Delete</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" name="id" id="did">
								<div class="form-group">
									<p>Bạn có muốn xóa?</p>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" id="dsave-btn" style="width: 20%">Có</button>
								<button type="button" class="btn btn-info" data-dismiss="modal">Không</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- End Delete Product -->
<?php 
  include 'footer.php';
 ?>