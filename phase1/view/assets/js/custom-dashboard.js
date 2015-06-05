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
		//alert("hii");
			var webPageUrl = document.getElementById("webPageUrl").value;
			var parentSiteId = document.getElementById("parentSiteId").value;
			var isParentTrue = document.getElementById("isParentTrue").value;
			var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
			isValid = regexp.test(webPageUrl);
			if(!isValid)
			{
				alert('Please enter a valid URL');
				return;						
			}							
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = "webPageUrl=" + webPageUrl + "&parentSiteId=" + parentSiteId + "&isParentTrue=" + isParentTrue;
			//alert(dataString);
			if (webPageUrl == '') {
				alert("Please Fill All Fields");
			} else {
			//AJAX code to submit form.
			$.ajax({
				type: "POST",
				url: "form.php?action=addWebpageURL",
				data: dataString,
				cache: false,
				success: function(data) {
				alert ("Document updated successfully");
				webPageForm.submit();
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
function editWebsiteParams(id) {
		var id=id;
			var minvalue = document.getElementById("minvalue"+id).value;
			var maxvalue = document.getElementById("maxvalue"+id).value;
			var desc = document.getElementById("desc"+id).value;
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = "minvalue=" + minvalue + "&maxvalue=" + maxvalue + "&desc=" + desc + "&id=" + id;
			//alert(dataString);
			if (minvalue == '' || maxvalue == '' || desc == '') {
				alert("Please Fill All Fields");
			} else {
			//AJAX code to submit form.
			$.ajax({
				type: "POST",
				url: "form.php?action=updateparameters",
				data: dataString,
				cache: false,
				success: function(data) {
				alert ("Document updated successfully");
				webPageForm.submit();
				
			}
			});
			}
			return false;
		}
		
		
		function pageRefresh()
		{
			
			location.reload();
			
		}