
	function empty_field(string) {
      var validity = true;

      if( string == '' ) { validity = false; }
      return validity;
    }
    function sanitize_string(string) {

      var validity = true;

      if( string.match( /[|<|,|>|\?|\/|:|;|"|'|{|\[|}|\]|\||\\|~|`|!|@|#|\$|%|\^|&|\*|\(|\)|\+|=]+/ ) != null ) {
          validity = false;
      }

      return validity;
    }

    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    function CheckIsValidDomain(domain) { 
      var re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/); 
      return domain.match(re);
    } 

    function validation_field(typefield, idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax){  
    	if (typefield == 'email'){
    		return validation_field_email(idField, idmsg, msgempty, msginvalid, toolong, lgmax);
    	}else if (typefield == 'password'){
    		return validation_field_password(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax);
    	}else if (typefield == 'domain'){
    		return validation_field_domain(idField, idmsg, msgempty, msginvalid);
    	}else if (typefield == 'text'){
    		return validation_field_string(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax);
    	}
	}

    function setMsgError(idmsg, msgError, idField){
      document.getElementById(idmsg).innerHTML = msgError;
      document.getElementById(idmsg).style.color = "red";
      document.getElementById(idmsg).style.fontWeight = "bold";
      document.getElementById(idField).focus();
      document.getElementById(idField).style.color = "red";
    }

    function resetColorField(idField){
      document.getElementById(idField).style.color = 'black';  
    }
    function resetColorFieldMsg(idmsg){         
      document.getElementById(idmsg).innerHTML = '';
      document.getElementById(idmsg).style.color = "green";
    }

    function validation_field_email(idField, idmsg, msgempty, msginvalid, toolong, lgmax){    
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg);
    	if (msgempty != ''){
  			if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}
  		}
  		if (field_validation != ''){
  			if (!validateEmail(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}
  		}
      if (field_validation.length > parseInt(lgmax)) { setMsgError(idmsg, toolong, idField); return false;}
      return true;
    }
    function validation_field_password(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax){    	
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg); 
  		if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}
  		if (!sanitize_string(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}
  		if (field_validation.length < parseInt(lgmin)) { setMsgError(idmsg, tooshort, idField); return false;}
  		if (field_validation.length > parseInt(lgmax)) { setMsgError(idmsg, toolong, idField); return false;}
      return true;		
    }
    function validation_field_domain(idField, idmsg, msgempty, msginvalid){    	
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg);
  		if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}
  		if (!CheckIsValidDomain(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}
      return true;    
    }
    function validation_field_string(idField, idmsg, msgempty, msginvalid, tooshort, toolong, lgmin, lgmax){    	
    	var field_validation = document.getElementById(idField).value;
    	resetColorFieldMsg(idmsg);
    	if (msgempty != ''){
    		if (!empty_field(field_validation)){ setMsgError(idmsg, msgempty, idField);document.getElementById(idField).value = ''; return false;}	
    	}		
  		if (!sanitize_string(field_validation)){ setMsgError(idmsg, msginvalid, idField); return false;}   
  		if (field_validation.length < parseInt(lgmin)) { setMsgError(idmsg, tooshort, idField);return false;}
      if (field_validation.length > parseInt(lgmax)) { setMsgError(idmsg, toolong, idField);return false;}
      return true;    
	}
    