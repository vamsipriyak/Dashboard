		//To show and hide 'is parent div'
		$(document).ready(function() {
		
		 $("input:radio[name=isParent]").click(function() {
			var value = $(this).val();			
			if(value == 'No')
			{
			  $("#parentSite").show(); 
			}
			else
			{
			 $("#parentSite").hide(); 
			}
			
		});
		
           
        });
		////To post data of websites to form-backend.php
	function postWebsiteParams() {
			
			var webPageUrl = document.getElementById("webPageUrl").value;
			var parentSiteId = document.getElementById("webPageUrl").value;
			var isParentTrue = $("input[name=isParent]:checked").val();	
			var paramsMinArray = new Array();  			
			var paramsMaxArray = new Array();
			for (paramindex = 0; paramindex < 10; paramindex++) {				
				paramsMinArray[paramindex] = $("#param"+(paramindex+1)+"_minvalue").val();
				paramsMaxArray[paramindex] = $("#param"+(paramindex+1)+"_maxvalue").val();
			}
			var paramsMinJSON = JSON.stringify(paramsMinArray);			
			var paramsMaxJSON = JSON.stringify(paramsMaxArray);
			/*var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
			isValid = regexp.test(webPageUrl);
			if(!isValid)
			{
				alert('Please enter a valid URL');
				return;						
			}*/							
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = "webPageUrl=" + webPageUrl + "&parentSiteId=" + isParentTrue + "&paramsMin="+ paramsMinJSON + "&paramsMax="+ paramsMaxJSON;
			alert(dataString);
			//alert(dataString);
			if (webPageUrl == '') {
				alert("Please Fill All Fields");
			} else {
			//AJAX code to submit form.
			$.ajax({
				type: "POST",
				url: "form.php",
		//		data: dataString,
				cache: false,
				success: function(data) {
				alert (data);
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
			var container = document.getElementById('parentSite');
				var children = container.getElementsByTagName('select');
				for (var i = 0; i < children.length; i++) {
					children[i].selectedIndex = 0;
				}			
			document.getElementById("isParentTrue").checked = true;
			if(document.getElementById("isParentTrue").checked)
			{
				document.getElementById("parentSite").style.display = 'none';
			}
		}		
		function editWebsiteParams(id) {
			var id=id;
			var minvalue = document.getElementById("minvalue"+id).value;
			var maxvalue = document.getElementById("maxvalue"+id).value;
			var desc = document.getElementById("desc"+id).value;
			var baseurl = document.getElementById("baseurl").value;
			//alert(baseurl);
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = "minvalue=" + minvalue + "&maxvalue=" + maxvalue + "&desc=" + desc + "&id=" + id;
			//alert(dataString);
			if (minvalue == '' || maxvalue == '' || desc == '') {
				alert("Please Fill All Fields");
			} else {
			//AJAX code to submit form.
			$.ajax({
				type: "POST",
				url: "edit/updateParam",
				//url: "form.php?action=updateparameters",
				data: dataString,
				cache: false,
				success: function(data) {
				//alert ("Parameter values updated successfully");
				if(data =='Parameter values updated successfully')
				{
				  window.location = baseurl+"index.php/edit?update=success";
				//alert("Parameter values updated successfully")
				}
				else
				{
				 window.location = baseurl+"index.php/edit?update=failed";

				//alert("Updation failed");
				//webPageForm.submit();				

				}
			}
			});
			}
			return false;
		}
	function editThresholdParams(id) {
		var id=id;
		 
			var minvalue = document.getElementById("minvalue"+id).value;
			var maxvalue = document.getElementById("maxvalue"+id).value;
			var parampageid = document.getElementById("parampageid").value;
			var baseurl = document.getElementById("baseurl").value;
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = "minvalue=" + minvalue + "&maxvalue=" + maxvalue +  "&id=" + id +  "&parampageid=" + parampageid;
			//alert(baseurl);
			//alert(dataString);
			if (minvalue == '' || maxvalue == '' ) {
				//alert("Please Fill All Fields");
				$("#minvalue"+id).css("border-color" , "");
				$("#maxvalue"+id).css("border-color" , "");
				if(minvalue == '' && maxvalue != '')
				{
				$("#minvalue"+id).focus();
				$("#minvalue"+id).css("border-color" , "red");
				}
				else if(maxvalue == '' && minvalue != '')
				{
				$("#maxvalue"+id).focus();
				$("#maxvalue"+id).css("border-color" , "red");
				}
				else
				{
				
				$("#minvalue"+id).focus();
				$("#minvalue"+id).css("border-color" , "red");
				$("#maxvalue"+id).focus();
				$("#maxvalue"+id).css("border-color" , "red");
				}
				$("#errmsg").html("Please fill all fields");
				$("#errmsg").css( "color", "red" );
				
				
			} 
			else if(minvalue >= maxvalue )
			{
			$("#errmsg").html("Minimum value should not be greater than maximum value");
		    $("#errmsg").css( "color", "red" );
			}			
			else {
			//AJAX code to submit form.
			$.ajax({
				type: "POST",
				url: baseurl+"index.php/editThreshold/updateThreshold",
				//url: "form.php?action=updateparameters",
				data: dataString,
				cache: false,
				success: function(data) {
				//alert ("Parameter values updated successfully");
				if(data =='Parameter values updated successfully')
				{
				  window.location = baseurl+"index.php/edit/editthreshold/"+parampageid +"?update=success";
				//alert("Parameter values updated successfully")
				}
				else
				{
				 window.location = baseurl+"index.php/edit?update=failed";

				//alert("Updation failed");
				//webPageForm.submit();				

				}				
			}
			});
			}
			return false;
		}
			
		
		function pageRefresh()
		{
			location.reload();
			
		}
		
		
