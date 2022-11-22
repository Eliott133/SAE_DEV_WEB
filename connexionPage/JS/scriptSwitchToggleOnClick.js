console.log("JS MARCHER");

var bodySelector = document.getElementById('body');
var isFocus = false;

var TitlePageSelector = document.getElementById('TitlePage');
var infoEnvoieMailSelector = document.getElementById('infoEnvoieMail');
var mailsColorSelector = document.getElementById("mailsColor");

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
  bodySelector.style.backgroundColor = "#34495e";
  TitlePageSelector.style.color = "white";
  infoEnvoieMailSelector.style.color = "white";
  mailsColor.style.color = "#e67e22";
}

function whiteMode() {
  bodySelector.style.backgroundColor = "white";
  TitlePageSelector.style.color = "#34495e";
  infoEnvoieMailSelector.style.color = "#34495e";
  mailsColor.style.color = "#2A5DC6"; 
}
