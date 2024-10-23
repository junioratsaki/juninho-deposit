document.getElementById('photo').addEventListener('change', function(event) { 
    const file = event.target.files[0];
    const photoPreview = document.getElementById('photoPreview'); 
    if (file) { const reader = new FileReader(); reader.onload = function(e) {  photoPreview.src = e.target.result; };
      reader.readAsDataURL(file);  }
      else {  photoPreview.src = '';  }});
  