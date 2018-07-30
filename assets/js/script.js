jQuery(document).ready(function() {
   
    jQuery("#btn-upload").on("click", function(){
    	var image = wp.media({
    		title:"Upload Image for My Book",
    		multiple:false
    	}).open().on("select", function(){
    		var uploaded_image = image.state().get("selection").first();
    		//console.log(uploaded_image.toJSON().url);
    		var getImage = uploaded_image.toJSON().url;
    		jQuery("#show-image").html("<img src='"+getImage+"' style='height:50px; width:50px;'/>");
    		jQuery("#image_name").val(getImage);

    	});
    });


    /*========= Data Table Active ===========*/
    jQuery('#my-book').DataTable();
    /*========= Form Validation Active ===========*/
    jQuery("#frmAddBook").validate({
        submitHandler:function(){
            var postdata = "action=mybooklibrary&param=save_book&" + jQuery("#frmAddBook").serialize();
            jQuery.post(mybookajaxurl,postdata,function(response){
                var data = jQuery.parseJSON(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    });
                }
            });
        }
    });
} );