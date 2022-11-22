console.log("JS");

var bodySelector = document.getElementById('body');
isFocus = false;

function onClickSwitchToggle() {
  if (isFocus==false) {
    nightMode();
    isFocus = true;
  }else {
    whiteMode();
    isFocus = false;
  }
}

function nightMode() {
  bodySelector.style.backgroundColor = "#34495E";
}

function whiteMode() {
  bodySelector.style.backgroundColor = "#2A5DC6";
}
