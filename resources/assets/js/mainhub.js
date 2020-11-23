document.addEventListener('DOMContentLoaded', (event) => {
  //the event occurred

    //callAll("/resources/assets/js/query.js");
    callAllJS("/resources/assets/js/foundation.js");
    callAllJS("/public/fontawesome/js/all.min.js");
    callAllJS("/resources/assets/js/propper.js");
    callAllJS("/resources/assets/js/init.js");
    callAllJS("/resources/assets/js/axios.js");
    callAllJS("/resources/assets/js/vue.js");
    callAllJS("/resources/assets/js/pages/main.js");



})

    
    

function callAllJS(jsfiles){
    let srcp = document.createElement("script");
    srcp.setAttribute("type", "text/javascript");
    srcp.setAttribute("src", jsfiles);
    $js = document.getElementsByTagName("body")[0].appendChild(srcp); 
    //console.log(document.getElementsByTagName("body")[0]);
	//console.log($js);
}


