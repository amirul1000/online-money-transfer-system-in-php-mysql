 function checkRequired()
	{
		
		
		if(document.getElementById("name").value == "")
		 {
		   document.getElementById("name").focus();		
		   alert("Category name is required field ");	 
		   return false;
		 }
		
		
		return true;
	}