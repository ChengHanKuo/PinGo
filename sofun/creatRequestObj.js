function creatRequestObj(){
var request = null;
try {
//IE7,or non-IE browser
request = new XMLHttpRequest();
} catch (trymicrosoft) {
try {
//IE browser
request = new ActiveXObject("Msxml2.XMLHTTP");
} catch (othermicrosoft) {
try {
//other IE browser
request = new ActiveXObject("Microsoft.XMLHTTP");
} catch (failed) {
//not support
request = null;
}
}
}
return request;
}