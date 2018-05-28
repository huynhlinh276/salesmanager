console.log('ok');
$(document).ready(function(){
	getProducts();
	// $('#product-table').DataTable({
	// 	responsive: true,
	// 	autoWidth: false,
	// });
	$("#add-btn").click(function(event){
		event.preventDefault();
		// var formData = $("#add-product-form").serialize();
		// console.log(formData);
		var productform = document.querySelector("#add-product-form");
		
		$.ajax({
			method: "POST",
			dataType: 'json',
			url :"addProduct.php",
			processData: false,
			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			
			if(data.result) {
			// TODO Đóng modal
				$(".fade").modal("hide");
			// TODO Xoá trống các input
				productform.reset();
				$("#img-preview").val("");
			// Đọc lại danh sách sản phẩm
				console.log("save succeed.");
				getProducts();
			}else{

			}
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			//console.log(errorThrown);
		})
	}) // End Add Product
	// Update Product
	$("tbody").on("click", ".edit", function(){
		// Đọc thông tin
		var id = $(this).parents("tr").attr("id");
		var name = $(this).parents("tr").find(".name").text();
		var code = $(this).parents("tr").find(".code").text();
		
		var description = $(this).parents("tr").find(".description").text();
		var price = $(this).parents("tr").find(".price").text();
		var status = $(this).parents("tr").find(".status").text();
		var img = $(this).parents("tr").find(".thumbnail").attr("src");
		console.log(img);
		// Hiển thị thông tin form cập nhật
		$("#uid").val(id);
		$("#uname").val(name);
		$("#ucode").val(code);
		$("#udescription").val(description);
		$("#uprice").val(price);
		$("#ustatus").val(status);
		$("#uimage-preview").attr("src", img);
		// Hiển thị popup
		$("#update").modal();
	}) // End update
	// Xử lý submit form cập nhật
	$("#usave-btn").click(function(event){
		event.preventDefault();
		// var formData = $("#update-product-form").serialize();
		// console.log(formData);
		var productform = document.querySelector("#update-product-form");
		$.ajax({
			method: "POST",
			dataType: 'json',
			url :"updateProduct.php",
			processData: false,
			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			// TODO Đóng modal
			if(data.result){
				$("#update").modal("hide");
				getProducts();
			}			
			// TODO Xoá trống các input
			// Đọc lại danh sách sản phẩm

		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})
	// Delete Product
	$("tbody").on("click", ".delete", function(){
		var id = $(this).parents("tr").attr("id");
		$('#did').val(id);
		// Hiển thị popup
		$("#delete").modal();
	}) // End update
	// Xử lý submit form cập nhật
	$("#dsave-btn").click(function(){
		event.preventDefault();
		var formData = $("#delete-product-form").serialize();
		console.log(formData);
		$.ajax({
			method: "POST",
			url :"deleteProduct.php",
			// dataType: 'json',
			data: formData ,
		}).done(function(data){
			// if(data.result) {
			// TODO Đóng modal
			$(".fade").modal("hide");
			// TODO Xoá trống các input
			// Đọc lại danh sách sản phẩm
			getProducts();
			// }else{

			// }
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})
}) // End document ready

function getProducts(){
	$.ajax({
		url: 'getProducts.php',
		method: 'POST',
		dataType: 'json',
		//data
	}).done(function(data){
		
		if (data.result) {
			var rows = "";
			$.each(data.product, function(index, product){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+product.id+"'>";
				rows += "<td class='image'>"+"<img class='thumbnail' src='"+product.image+"'>"+"</td>";
				rows += "<td class='name'>"+product.product_name+"</td>";
				rows += "<td class='code'>"+product.product_code+"</td>";
				rows += "<td class='description'>"+product.description+"</td>";
				rows += "<td class='price'>"+product.price+"</td>";
				rows += "<td class='status'>"+product.status+"</td>";

				rows += "<td>";
				rows += "<button class='btn btn-primary edit'>Edit</button>";
				rows += "<button class='btn btn-danger delete'>Delete</button>";
				rows += "</td>";
				rows += "</tr>";
			})
			$("tbody").html(rows);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+jqXHR.responseText);
		console.log(statusText);
	}).always(function(){

	})
}
function clearFileInput(id) 
{ 
    // var oldInput = document.getElementById(id); 

    // var newInput = document.createElement("input"); 

    // newInput.type = "file"; 
    // newInput.id = oldInput.id; 
    // newInput.name = oldInput.name; 
    // newInput.className = oldInput.className; 
    // newInput.style.cssText = oldInput.style.cssText; 
    // // TODO: copy any other relevant attributes 

    // oldInput.parentNode.replaceChild(newInput, oldInput); 
}

clearFileInput("#fileToUpLoad");
