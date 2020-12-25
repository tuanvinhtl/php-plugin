window.addEventListener("load", function () {
    var tabs = document.querySelectorAll("ul.nav-tabs > li");

    for (let index = 0; index < tabs.length; index++) {
        tabs[index].addEventListener("click", switchTab);
    }

    function switchTab(event) {
        document.querySelector("ul.nav-tabs li.active").classList.remove('active');
        document.querySelector(".tab-pane.active").classList.remove('active');

        var clickedTab = event.currentTarget;
        var anchor = event.target;
        var activePaneId = anchor.getAttribute("href");


        clickedTab.classList.add("active");
        document.querySelector(activePaneId).classList.add("active");

    }
});