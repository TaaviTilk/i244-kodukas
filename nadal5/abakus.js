    function goBack() {
    window.history.back();
    }
    window.onload = function() {
    var kuulid = document.getElementsByClassName("bead");
    var len = kuulid.length;

    for ( i=0;i<len; i++) kuulid[i].onclick = function() {slide(this)};

    function slide(kuulid)  {
		var asukoht = getComputedStyle(kuulid,null).cssFloat;
			if (asukoht == "right") {
			kuulid.style.cssFloat = "left";
				} else {
			kuulid.style.cssFloat = "right";
			}
			}

}