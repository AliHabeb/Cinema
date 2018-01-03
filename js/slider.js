window.onload=function () {
    var imgs=document.getElementsByClassName("slider-img");
    var x=0;
    imgs[imgs.length-1].style.display="block";
    setInterval(next,3000);

    function next() {
        for(i=0;i<imgs.length;i++){
            if(i!=x)imgs[i].style.display="none";
        }
        imgs[x].style.display="block";
        x++;
        if(x>=imgs.length)x=0;
    };
};
