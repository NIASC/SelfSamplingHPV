window.onload = init;
                
function init() {
    var home = document.getElementById("home");
    var about_us = document.getElementById("about_us");
    var partners = document.getElementById("partners");
    var scientific_aims = document.getElementById("scientific_aims");
    var working_groups = document.getElementById("working_groups");
    var resources = document.getElementById("resources");
    var news_events = document.getElementById("news_events");
    var trainig_open_pos = document.getElementById("trainig_open_pos");

    var home.onclick = select_home;
    var about_us.onclick = select_about_us;
    var partners.onclick = select_partners;
    var scientific_aims.onclick = select_scientific_aims;
    var working_groups.onclick = select_working_groups;
    var resources.onclick = select_resources;
    var news_events.onclick = select_news_events;
    var trainig_open_pos.onclick = select_trainig_open_pos;
}
                
function select_home() {
    var li = document.getElementById("home");
    showHide(li);
}
                
function select_about_us() {
    var li = document.getElementById("about_us");
    showHide(li);
}

function select_partners() {
    var li = document.getElementById("partners");
    showHide(li);
}

function select_scientific_aims() {
    var li = document.getElementById("scientific_aims");
    showHide(li);
}

function select_working_groups() {
    var li = document.getElementById("working_groups");
    showHide(li);
}

function select_resources() {
    var li = document.getElementById("resources");
    showHide(li);
}

function select_news_events() {
    var li = document.getElementById("news_events");
    showHide(li);
}

function select_trainig_open_pos() {
    var li = document.getElementById("trainig_open_pos");
    showHide(li);
}

function showHide(el) {
    // hide everything except what we clicked on
    var selectedItems = document.querySelectorAll(".selected");
    for (var i = 0; i < selectedItems.length; i++) {
        if (selectedItems[i] != el) {
            selectedItems[i].setAttribute("class", "");
        }
    }
                
    var ulClass = el.getAttribute("class");
    if (ulClass == "selected") {
        // item is selected, so deselect it
        el.setAttribute("class", "");
    }
    else {
        // item is not selected, so select it
        el.setAttribute("class", "selected");
    }
}              
