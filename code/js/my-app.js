// Initialize your app
var myApp = new Framework7();

// Export selectors engine
var $$ = Dom7;

// Add views
var mainView = myApp.addView('.view-main', {
  
    dynamicNavbar: true
});
var view2 = myApp.addView('#view-2', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
});
var view3 = myApp.addView('#view-3', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
});
var view4 = myApp.addView('#view-4', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
});
function iOSversion() {
  if (/iP(hone|od|ad)/.test(navigator.platform)) {
    var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
    return [parseInt(v[1], 10)+"."+parseInt(v[2], 10)+"."+parseInt(v[3] || 0, 10)];
  }
}

var part1 = 'itms-services://?action=download-manifest&url=https%3A%2F%http://2Fsmartinstaller.com%2Finstall.php%3Fipa%3D';
var part2 = '';
var part3 = '';
var part4 = '';
var resultpart4 = ''
function installApp() {
 part1 = 'itms-services://?action=download-manifest&url=https%3A%2F%http://2Fsmartinstaller.com%2Finstall.php%3Fipa%3D';
 part2 = document.getElementById('applink');
 part3 = '%26icon%3Dhttps://ipabox.store/app/title.png%26title%3D';
 part4 = document.getElementById('appname');
 resultpart4 = part4.value.split(' ').join('%2520')
 location.replace(part1 + part2.value + part3 + resultpart4)
}