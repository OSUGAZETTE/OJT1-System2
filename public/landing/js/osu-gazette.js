var end = 1900;
var start = new Date().getFullYear();
var optionyear = "";
optionyear += "<option selected hidden>Year...</option>";
for(var year = start ; year >=end; year--){
    optionyear += "<option value="+year+">"+ year +"</option>";
}
document.getElementById("S-year").innerHTML = optionyear;

var optionsmonth = "";
var monthNames = [ "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December" ];
var a = 0;
optionsmonth += "<option selected hidden>Month...</option>";
for(this.a ; this.a <= (this.monthNames.length - 1); this.a++){
    optionsmonth += "<option value="+ (this.a + 1) +">"+ this.monthNames[this.a] +"</option>";
}
document.getElementById("S-month").innerHTML = optionsmonth;

$("#clearsearch").click(function(){         
	$("#S-month").prop('selectedIndex',0);
	$("#S-year").prop('selectedIndex',0);
	$("#S-txt").val("");
});