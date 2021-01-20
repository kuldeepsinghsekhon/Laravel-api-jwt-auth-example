//slider

//slider

//sidenavhome3


function openNav() {
    $("#opennav").removeAttr("onclick");
    $('#opennav').attr('onclick', 'closeNav()');
    document.getElementById("mySidenav").style.width = "230px";
    document.getElementById("nav").style.marginLeft = "230px";
    document.getElementById("main").style.marginLeft = "230px";




}

function closeNav() {
    $("#opennav").removeAttr("onclick");
    $('#opennav').attr('onclick', 'openNav()');
    document.getElementById("mySidenav").style.width = "0px";
    document.getElementById("nav").style.marginLeft = "0px";
    document.getElementById("main").style.marginLeft = "0px";




}





