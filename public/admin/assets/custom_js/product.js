$(document).ready(function(){
    //select category showing all sub category
    $("#category_id").change(function(){
     let id = $(this).val();
    
     $.ajax({

        url    : "/product/category/select/"+id,
        type   : "GET",
        success: function(res){
            if(res.status === "success"){
               let sub_category_options = $("#sub_category_id");

               sub_category_options.empty();
               //subCategoryDropdown.append($('<option value="" disabled selected> -- Select Sub Category --</option>'));

                // Populate the sub-category dropdown with the retrieved data
                $.each(res.data, function(index, subCategory) {
                    sub_category_options.append($('<option value="' + subCategory.id + '">' + subCategory.name + '</option>'));
                });
                console.log("Working ",res.data);

            }
           
        }
     })
    });
  });