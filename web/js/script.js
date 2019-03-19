document.querySelector(".menu-toggle").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("sidebar-wrapper").classList.toggle("active");
    document.querySelector(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").classList.toggle("fa-bars fa-times");
});

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

