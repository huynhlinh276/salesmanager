console.log('ok');
$(document).ready(function(){
	getNews();
	$('#news-table').DataTable({
		responsive: true,
		autoWidth: false,
	});
	$("#add-btn").click(function(event){
		event.preventDefault();
		// var formData = $("#add-product-form").serialize();
		// console.log(formData);
		var productform = document.querySelector("#add-news-form");
		 console.log(productform);
		$.ajax({
			method: "POST",
			dataType: 'json',
			url :"addNews.php",
			processData: false,
			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			 // console.log(data);
			if(data.result) {
			// TODO Đóng modal
				$(".fade").modal("hide");
			// TODO Xoá trống các input
				productform.reset();
				$("#image-preview").val("");
			// Đọc lại danh sách sản phẩm
				// console.log("save succeed.");
				getNews();
			}else{

			}
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	}) // End Add News
	// Update News
	$("tbody").on("click", ".edit", function(){
		// Đọc thông tin
		var id = $(this).parents("tr").attr("id");
		var title = $(this).parents("tr").find(".title").text();
		var content = $(this).parents("tr").find(".content").text();
		var content_demo = $(this).parents("tr").find(".content_demo").text();
		var properties = $(this).parents("tr").find(".properties").text();
		var image = $(this).parents("tr").find(".image").attr("src");
		console.log(image);
		// Hiển thị thông tin form cập nhật
		$("#uid").val(id);
		$("#utitle").val(title);
		$("#ucontent").val(content);
		$("#ucontent_demo").val(content_demo);
		$("#uproperties").val(properties);
		$("#uimage-preview").attr("src", image);
		// Hiển thị popup
		$("#update").modal();
	}) // End update
	// Xử lý submit form cập nhật
	$("#usave-btn").click(function(event){
		event.preventDefault();
		// var formData = $("#update-product-form").serialize();
		// console.log(formData);
		var productform = document.querySelector("#update-news-form");
		$.ajax({
			method: "POST",
			dataType: 'json',
			url :"updateNews.php",
			processData: false,
			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			// TODO Đóng modal
			if(data.result){
				$("#update").modal("hide");
				getNews();
			}			
			// TODO Xoá trống các input
			// Đọc lại danh sách sản phẩm

		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			// console.log(errorThrown);
		})
	})
	// Delete NEws
	$("tbody").on("click", ".delete", function(){
		var id = $(this).parents("tr").attr("id");
		$('#did').val(id);
		// Hiển thị popup
		$("#delete").modal();
	}) // End update
	// Xử lý submit form cập nhật
	$("#dsave-btn").click(function(){
		event.preventDefault();
		var formData = $("#delete-news-form").serialize();
		console.log(formData);
		$.ajax({
			method: "POST",
			url :"deleteNews.php",
			// dataType: 'json',
			data: formData ,
		}).done(function(data){
			// if(data.result) {
			// TODO Đóng modal
			$(".fade").modal("hide");
			// TODO Xoá trống các input
			// Đọc lại danh sách sản phẩm
			getNews();
			// }else{

			// }
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})
}) // End document ready

function getNews(){
	$.ajax({
		url: 'getNews.php',
		method: 'POST',
		dataType: 'json',
		//data
	}).done(function(data){
		
		if (data.result) {
			var rows = "";
			$.each(data.product, function(index, product){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+product.id+"'>";
				rows += "<td class='title'>"+product.title+"</td>";
				rows += "<td class='content'>"+product.content+"</td>";
				rows += "<td class='content_demo'>"+product.content_demo+"</td>";
				rows += "<td class='image'>"+"<img class='thumbnail' src='"+product.image+"'>"+"</td>";
				rows += "<td class='properties'>"+product.properties+"</td>";

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

