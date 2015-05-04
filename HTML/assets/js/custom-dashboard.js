		//To show and hide 'is parent div'
		$(document).ready(function() {
            $('#isParentFalse').click(function(){
                
                $("#parentSite").show(); 
            });
            $('#isParentTrue').click(function(){
                
                $("#parentSite").hide(); 
            });
        });
		////To post data of websites to form-backend.php
		function postWebsiteParams() {
			var webPageUrl = document.getElementById("webPageUrl").value;
			var parentSiteId = document.getElementById("parentSiteId").value;
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = "webPageUrl=" + webPageUrl + "&parentSiteId=" + parentSiteId;
			//alert(dataString);
			if (webPageUrl == '') {
				alert("Please Fill All Fields");
			} else {
			//AJAX code to submit form.
			$.ajax({
				type: "POST",
				url: "form-backend.php",
				data: dataString,
				cache: false,
				success: function(data) {
			}
			});
			}
			return false;
		}
		
		////To reset values when clicked on Reset button
		function resetValues()
		{
			document.getElementById("webPageUrl").value = '';
			document.getElementById("parentSiteId").value = '';
			document.getElementById("isParentTrue").checked = true;
		}		
