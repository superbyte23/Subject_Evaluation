function dangerAlert(msg){
    $.toast({
        heading: 'Ooops!',
        text: msg,
        showHideTransition: 'slide',
        icon: 'error',
        loader: false,
        loaderBg: '#f2a654',
        position: 'top-right',
        hideAfter: 2000
    });
}
function successAlert(msg){
	$.toast({
        heading: 'Well Done!',
        text: msg,
        showHideTransition: 'slide',
        icon: 'success',
        loader: false,
      	loaderBg: '#f96868',
        position: 'top-right',
        hideAfter: 2000
    });
}
function warningAlert(msg){
   $.toast({
      heading: 'Warning',
      text: msg,
      showHideTransition: 'slide',
      icon: 'warning',
      loader: false,
      loaderBg: '#57c7d4',
      position: 'top-right',
      hideAfter: 2000
    });
}