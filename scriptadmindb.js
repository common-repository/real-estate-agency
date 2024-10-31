/*
 *  scriptadmindb.js 1.0 07/01/17
 *
 * Javascript implementation of Ajax for db
 *
 * Copyright (c) 2017 Patrick Petit. All Rights Reserved.
 *
 * Permission to use, copy, modify, and distribute this software
 * and its documentation for any purposes and without
 * fee is hereby granted provided that this copyright notice
 * appears in all copies.
 *
 * Of course, this soft is provided "as is" without express or implied
 * warranty of any kind.
 *
 *
 */

   function update_pwd_wp_db(login, pwd) {
      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var result = this.responseText;
        var obj = JSON.parse(result); 
          if (obj.exitvalue == '1') {         
            document.getElementById("msgaccountvalidation").innerHTML = "Votre compte a été créé, vous pouvez cliquer sur le menu Tous les biens";
            document.getElementById("msgaccountvalidation").style.color = "green";
            document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
          }else if (obj.exitvalue == '0') {
            document.getElementById("msgaccountvalidation").innerHTML = "votre compte est créé, vous pouvez cliquer sur le menu Tous les biens" ;
            document.getElementById("msgaccountvalidation").style.color = "green";
            document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
          }else{
            document.getElementById("msgaccountvalidation").innerHTML = "Une erreur est survenue, merci de recommencer ";
            document.getElementById("msgaccountvalidation").style.color = "red";
            document.getElementById("msgaccountvalidation").style.fontWeight = "bold";
          }
        }
      };
      var data_string = 'action=' + 'update_pwd_wp_db' + '&e=' + login + '&p=' + pwd;
      xmlhttp.open("POST", ajaxurl, true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(data_string);
    }

  function changePwd_wp_db(login, pwd) {
      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var result = this.responseText;
        var obj = JSON.parse(result); 
          if (obj.exitvalue == '1') {         
            document.getElementById("msgpwd").innerHTML = "Votre mot de passe a été mis à jour, vous pouvez cliquer sur le menu Tous les biens ";
            document.getElementById("msgpwd").style.color = "green";
                document.getElementById("msgpwd").style.fontWeight = "bold";
          }else if (obj.exitvalue == '0') {
            document.getElementById("msgpwd").innerHTML = "Votre mot de passe a été mis à jour, vous pouvez cliquer sur le menu Tous les biens ";
            document.getElementById("msgpwd").style.color = "green";
            document.getElementById("msgpwd").style.fontWeight = "bold";
          }else{
            document.getElementById("msgpwd").innerHTML = "Une erreur est survenue, merci de recommencer " + obj.exitvalue;
            document.getElementById("msgpwd").style.color = "red";
              document.getElementById("msgpwd").style.fontWeight = "bold";
          }
        }
      };
      var data_string = 'action=' + 'update_pwd_wp' + '&e=' + login + '&p=' + pwd;
      xmlhttp.open("POST", ajaxurl, true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(data_string);
    }

 function logout_wp_db(login) {
      xmlhttp = new XMLHttpRequest();
      var idmsg = "msglogout";
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var result = this.responseText;
          var obj = JSON.parse(result); 
          if (obj.exitvalue == '1') {          
            document.getElementById(idmsg).innerHTML = "Vous êtes déconnecté de Real estate";
            document.getElementById(idmsg).style.color = "green";
              document.getElementById(idmsg).style.fontWeight = "bold";
          }else if (obj.exitvalue == '0') {
            document.getElementById(idmsg).innerHTML = "Vous êtes déconnecté de Real estate" ;
            document.getElementById(idmsg).style.color = "green";
              document.getElementById(idmsg).style.fontWeight = "bold";
          }else{
            document.getElementById(idmsg).innerHTML = "Une erreur est survenue, merci de recommencer ";
            document.getElementById(idmsg).style.color = "red";
            document.getElementById(idmsg).style.fontWeight = "bold";
          }
        }
      };
      var data_string = 'action=' + 'logout_wp_db' + '&e=' + login + '&p=';
      xmlhttp.open("POST", ajaxurl, true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(data_string);
    }

  function login_wp_db(login, pwd) {
      xmlhttp = new XMLHttpRequest();
      var idmsg = "msglogin";
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var result = this.responseText;
          var obj = JSON.parse(result); 
          if (obj.exitvalue == '1') {         
            document.getElementById(idmsg).innerHTML = "Vous êtes connecté à Real estate, vous pouvez gérer tous vos biens";
            document.getElementById(idmsg).style.color = "green";
                document.getElementById(idmsg).style.fontWeight = "bold";
          }else if (obj.exitvalue == '0') {
            document.getElementById(idmsg).innerHTML = "Vous êtes connecté à Real estate, vous pouvez gérer tous vos biens" ;
            document.getElementById(idmsg).style.color = "green";
            document.getElementById(idmsg).style.fontWeight = "bold";
          }else{
            document.getElementById(idmsg).innerHTML = "Une erreur est survenue, merci de recommencer ";
            document.getElementById(idmsg).style.color = "red";
              document.getElementById(idmsg).style.fontWeight = "bold";
          }
        }
      };
      var data_string = 'action=' + 'login_wp_db' + '&e=' + login + '&p=' + pwd;
      xmlhttp.open("POST", ajaxurl, true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(data_string);
    }

  function update_smtp_wp_db(usernamesmtp, passwordsmtp, hostsmtp, portsmtp, securesmtp, authsmtp, autotlssmtp, fromsmtp, namesmtp, replysmtp, debugsmtp) {
    document.getElementById("msgparamsmtp").innerHTML = "update_smtp_wp_db test";
      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var result = this.responseText;
        var obj = JSON.parse(result); 
          if (obj.exitvalue == '1') {         
            document.getElementById("msgparamsmtp").innerHTML = "Vos paramètres Smtp sont enregistrés";
            document.getElementById("msgparamsmtp").style.color = "green";
            document.getElementById("msgparamsmtp").style.fontWeight = "bold";
          }else if (obj.exitvalue == '0') {
            document.getElementById("msgparamsmtp").innerHTML = "Vos paramètres Smtp sont enregistrés";
            document.getElementById("msgparamsmtp").style.color = "green";
            document.getElementById("msgparamsmtp").style.fontWeight = "bold";
          }else{
            document.getElementById("msgparamsmtp").innerHTML = "Une erreur est survenue, merci de recommencer ";
            document.getElementById("msgparamsmtp").style.color = "red";
            document.getElementById("msgparamsmtp").style.fontWeight = "bold";
          }
        }
      };

      var data_string = 'action=' + 'update_smtp_wp_db' + '&usernamesmtp=' + usernamesmtp + '&passwordsmtp=' + passwordsmtp + '&hostsmtp=' + hostsmtp + '&portsmtp=' + portsmtp + '&securesmtp=' + securesmtp + '&authsmtp=' + authsmtp + '&autotlssmtp=' + autotlssmtp + '&fromsmtp=' + fromsmtp + '&namesmtp=' + namesmtp + '&replysmtp=' + replysmtp + '&debugsmtp=' + debugsmtp;
      xmlhttp.open("POST", ajaxurl, true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(data_string);
    }

    function send_message(to, subject, message) {
      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var result = this.responseText;
        var obj = JSON.parse(result); 
          if (obj.exitvalue == '0') {
            document.getElementById("msgsendmessage").innerHTML = "Votre message a été envoyé";
            document.getElementById("msgsendmessage").style.color = "green";
            document.getElementById("msgsendmessage").style.fontWeight = "bold";
          }else{
            document.getElementById("msgsendmessage").innerHTML = "Une erreur est survenue, merci de recommencer vérifiez vos paamètres Smtp " + obj.error;
            document.getElementById("msgsendmessage").style.color = "red";
            document.getElementById("msgsendmessage").style.fontWeight = "bold";
          }
        }
      };

      var data_string = 'action=' + 'send_message' + '&to=' + to + '&subject=' + subject + '&message=' + message;
      xmlhttp.open("POST", ajaxurl, true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(data_string);
    }

    function update_site_wp_db() {
    //, codebodybackgroundcolor, codepcolor, codeh1color, codeh2color, codeh3color, codelinkcolor, codelinkhovercolor, codepricecolor, codelinkpaginationcolor, codelinkpaginationselectedcolor, codebtpaginationcolor, codebtpaginationbackgroundcolor, codeselectcolor, codeselectbackgroundcolor, codebtcolor, codebtbackgroundcolor) {
    //alert('login B' + login);
    document.getElementById("msgmessage").innerHTML = "update_site_client_wp_db test";
      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var result = this.responseText;
        var obj = JSON.parse(result); 
          if (obj.exitvalue == '1') {         
            document.getElementById("msgmessage").innerHTML = "Les paramètres de votre site sont enregistrés";
            document.getElementById("msgmessage").style.color = "green";
            document.getElementById("msgmessage").style.fontWeight = "bold";
          }else{
            document.getElementById("msgmessage").innerHTML = "Une erreur est survenue, merci de recommencer ";
            document.getElementById("msgmessage").style.color = "red";
            document.getElementById("msgmessage").style.fontWeight = "bold";
          }
        }
      };

 /*     var data_string = 'action=' + 'update_site_client_parameter_wp_db' + '&login=' + login + '&codebodybackgroundcolor=' + codebodybackgroundcolor + '&codepcolor=' + codepcolor + '&codeh1color=' + codeh1color + '&codeh2color=' + codeh2color + '&codeh3color=' + codeh3color + '&codelinkcolor=' + codelinkcolor + '&codelinkhovercolor=' + codelinkhovercolor + '&codepricecolor=' + codepricecolor + '&codelinkpaginationcolor=' + codelinkpaginationcolor + '&codelinkpaginationselectedcolor=' + codelinkpaginationselectedcolor + '&codebtpaginationcolor=' + codebtpaginationcolor + '&codebtpaginationbackgroundcolor=' + codebtpaginationbackgroundcolor + '&codeselectcolor=' + codeselectcolor + '&codeselectbackgroundcolor=' + codeselectbackgroundcolor + '&codebtcolor=' + codebtcolor + '&codebtbackgroundcolor=' + codebtbackgroundcolor;
      xmlhttp.open("POST", ajaxurl, true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(data_string);*/
    }