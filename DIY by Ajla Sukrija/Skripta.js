
//LOGIN FORME 

function check(form)
{

if(form.username.value == "Ajla" && form.password.value == "1234")
{
window.open('about.html')
}
else
{
alert("wrong Username or Password")
}
}



//FORMA VALIDACIJA ID I STAVLJANJE PLACEHOLDERA
function checkField(fieldId, msgElId) {
  var fieldEl = document.getElementById(fieldId);
  var msgEl = document.getElementById(msgElId);
  if (!fieldEl.value) {
    msgEl.style.display = "block";
    return false;
  } else {
    msgEl.style.display = "none";
    return true;
  }
}
//POZIV FUNKCIJE
function doContactValidation() {
  var emailValid = checkField('email', 'emailMsg');
  var subjectValid = checkField('subject', 'subjectMsg');
  var messageValid = checkField('message', 'messageMsg');

  if (!emailValid || !subjectValid || !messageValid) {
    document.getElementById('contact-submit').disabled = "disabled";
  } else {
    document.getElementById('contact-submit').disabled = "";
  }
}
//SEARCH FORMA VALIDACIJA
function doSearchValidation() {
  var searchValid = checkField('Search', 'mssgSearch');
  if (!searchValid) {
    document.getElementById('submit').disabled = "disabled";
  } else {
    document.getElementById('submit').disabled = "";
  }
}
//VOTE FORMA VALIDACIJA
function doVoteValidation() {
  var searchValid = checkField('vote', 'votemssg');
  if (!searchValid) {
    document.getElementById('submitVote').disabled = "disabled";
  } else {
    document.getElementById('submitVote').disabled = "";
  }
}

function doEditGalleryValidation(isEdit) {
  var num = checkField("arrayNumber", "arrayNumberMsg");
  var title = checkField("title", "titleMsg");
  var desc = checkField("message", "messageMsg");
  var date = checkField("date", "dateMsg");
  var url = true;
  if (!isEdit) 
    checkField("url", "urlMsg");
  else
    document.getElementById("urlMsg").style.display = "none";

  if (!num || !title || !desc || !date || !url) {
    document.getElementById('editGallerySubmit').disabled = "disabled";
  } else {
    document.getElementById('editGallerySubmit').disabled = "";
  }
}

function doLoginValidation() {
  var username = checkField("username", "usernameMsg");
  var password = checkField("password", "passwordMsg");

  if (!username ||!password) {
    document.getElementById('loginSubmit').disabled = "disabled";
  } else {
    document.getElementById('loginSubmit').disabled = "";
  }
}

//GLERIJA ON CLICK
function showFullImage(image) {
  document.getElementById("gallery-modal").style.display = "block";
  document.getElementById("gallery-image").src = image;
}
function closeFullImage() {
  document.getElementById("gallery-modal").style.display = "none";
}
document.onkeydown = function (e) {
  if (!e) e = event;
  if (e.keyCode == 27) {
    closeFullImage();
  }
}

//SLIDESHOW
var slideIndex = 1;
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("Slajd");
  var dots = document.getElementsByClassName("tacka");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}
function initSlideshow() {
  showSlides(1);
}


// AJAX Load
function loadPage(path, onLoadFunc) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("page-content").innerHTML = this.responseText;
     if (onLoadFunc) {
       onLoadFunc();
     }
    }
  };
  xhttp.open("GET", path, true);
  xhttp.send();
}

