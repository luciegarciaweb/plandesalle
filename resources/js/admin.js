//get jquery
var $ = require('jquery');

//create a toggle sidebar in administration
$(".sidebar-toggler").click(function (e) { 
    e.preventDefault();
    $("#sidebar").toggleClass("active");
});
