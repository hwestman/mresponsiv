
$(document).ready(function(){



});

function removeElementsFromGoogleMaps(){
    $gIframe = $( "#hero-image").find('#gmapsiframe');
    if($gIframe.length){
        $gIframe.find(".gmnoprint").remove();
        console.log($gIframe);
    }

}