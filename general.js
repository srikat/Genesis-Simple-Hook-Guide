window.onload = function () {
  var clickSelector = document.querySelectorAll('.genesis-hook input[type=text]');
  for (var i = 0 ; i < clickSelector.length; i++) {
    clickSelector[i].addEventListener('click', function(){
      this.select();
    });
  };
}
