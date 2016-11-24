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




