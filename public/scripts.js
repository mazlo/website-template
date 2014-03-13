var img_array = new Array();
	//img_array[0] = new Image(); img_array[0].src = "images/ct_banden200x126.jpg";
	img_array[0] = new Image(); img_array[0].src = "images/ct_click-tt200x136.jpg";
	//img_array[2] = new Image(); img_array[2].src = "images/ct_maschine200x117.jpg";
	img_array[1] = new Image(); img_array[1].src = "images/ct_platten200x136.jpg";
	//img_array[4] = new Image(); img_array[4].src = "images/ct_mannschaft200x129.jpg";
	img_array[2] = new Image(); img_array[2].src = "images/ct_imperial200x136.jpg";
	img_array[3] = new Image(); img_array[3].src = "images/ct_netz200x136.jpg";
	img_array[4] = new Image(); img_array[4].src = "images/ct_playing200x136.jpg";
	//img_array[8] = new Image(); img_array[8].src = "images/ct_schulsport200x152.jpg";
	img_array[5] = new Image(); img_array[5].src = "images/ct_spielplatz200x136.jpg";
	img_array[6] = new Image(); img_array[6].src = "images/ct_trickot200x136.jpg";
	img_array[7] = new Image(); img_array[7].src = "images/ct_zaehlgeraet200x136.jpg";
	
function openContactForm(whos) {
	form = "<p>";
	form += "<form action=\"_kontakt.php\" method=\"POST\">";
	form += "<p>Betreff: <input name=\"subject\" value=\"\" type=\"text\" size=\"35\"/></p>";
	form += "Deine Nachricht:";
	form += "<p><textarea name=\"text\" cols=\"50\" rows=\"15\"></textarea></p>";
	
	if (whos == "erster_vorsitzender") form += "<input type=\"hidden\" name=\"email\" value=\"wolfgang\" />";
	else if (whos == "zweiter_vorsitzender") form += "<input type=\"hidden\" name=\"email\" value=\"carsten\" />";
	else if (whos == "kassenwart") form += "<input type=\"hidden\" name=\"email\" value=\"matthi\" />";
	else if (whos == "schriftfuehrer") form += "<input type=\"hidden\" name=\"email\" value=\"christian\" />";
	else if (whos == "erster_mannschaftsfuehrer") form += "<input type=\"hidden\" name=\"email\" value=\"christian_mf\" />";
	else if (whos == "zweiter_mannschaftsfuehrer") form += "<input type=\"hidden\" name=\"email\" value=\"juergen\" />";
	
	form += "<input name=\"send\" value=\"Absenden\" type=\"submit\" />";
	form += "</form>";
	form += "</p>";
	
	return form;
}

function getMail(whos){
	if (whos == "mail_webmaster"){
		document.getElementById("mail_webmaster").firstChild.nodeValue = "webmaster"+getAt()+"ttc-benrath.de";
	}
	else if (whos == "mail_erster_vorsitzender"){
		document.getElementById("erster_vorsitzender").firstChild.nodeValue = "wsoenges"+getAt()+"ttc-benrath.de";
	}
	else if (whos == "mail_zweiter_vorsitzender"){
		document.getElementById("zweiter_vorsitzender").firstChild.nodeValue = "cseeber"+getAt()+"ttc-benrath.de";
	}
	else if (whos == "mail_kassenwart"){
		document.getElementById("kassenwart").firstChild.nodeValue = "m.zloch"+getAt()+"ttc-benrath.de";
	}
	else if (whos == "mail_erster_mannschaftsfuehrer"){
		document.getElementById("erster_mannschaftsfuehrer").firstChild.nodeValue = "cschulze"+getAt()+"ttc-benrath.de";
	}
	else if (whos == "mail_schriftfuehrer"){
		document.getElementById("schriftfuehrer").firstChild.nodeValue = "cschulze"+getAt()+"ttc-benrath.de";
	}
	else if (whos == "mail_zweiter_mannschaftsfuehrer"){
		document.getElementById("zweiter_mannschaftsfuehrer").firstChild.nodeValue = "jholzenthal"+getAt()+"ttc-benrath.de";
	}
	else if (whos == "mail_fragen_training"){
		document.getElementById("fragen_training").firstChild.nodeValue = "m.zloch"+getAt()+"ttc-benrath.de";
	}
}

function getAt(){
	return "@"
}

function loadRandomIMG(invokingIMG){
	invokingIMG.src = img_array[getRandomOf(img_array.length)].src;
}

function getRandomOf(quantity){
	return Math.round(Math.random() * 100) % quantity;
}