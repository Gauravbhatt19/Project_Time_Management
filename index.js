function crt(cont){
	var crtdt= new Date();
	var hr=crtdt.getHours();
	var mn=crtdt.getMinutes();
	var ap=(hr>=12)?"PM":"AM";
	hr=((hr%12)==0)?12:(hr%12);
	var timeset=hr+":"+mn+" "+ap;
	document.getElementById(cont).innerHTML=timeset;
}