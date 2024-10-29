const dropArea = document.getElementById("drop-area");
const inputFile = document.getElementById("input-file");
const imageView = document.getElementById("img-view");

inputFile.addEventListener("change", uploadImage);

function uploadImage(){
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    imageView.style.backgroundImage = `url(${imgLink})`;
    imageView.textContent = "";
    imageView.style.border = 0;
}

dropArea.addEventListener("drag.over", function(e){
    e.preventDefault();
});
dropArea.addEventListener("drop", function(e){
    e.preventDefault();
    inputFile.files = e.dataTransfer.files; 
    uploadImage()
});

 function toggleCheckboxes(checkbox) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"][name="' + checkbox.name + '"]');
            checkboxes.forEach(function(cb) {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });
        }
        function toggleCivilStatus(checkbox) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"][name="' + checkbox.name + '"]');
            checkboxes.forEach(function(cb) {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });
        }
    function toggleOptions() {
    document.getElementById("options").classList.toggle("show");
}

function selectOption(option) {
    if (option === 'months') {
        document.getElementById("monthsInput").style.display = "block";
        document.getElementById("yearsInput").style.display = "none";
    } else if (option === 'years') {
        document.getElementById("monthsInput").style.display = "none";
        document.getElementById("yearsInput").style.display = "block";
    }
}
// Function to toggle dropdown visibility
function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
}
 // Get all editable areas
 const editableAreas = document.querySelectorAll('.editable-area');

 // Add event listener to each editable area
 editableAreas.forEach(area => {
     area.addEventListener('input', function() {
         // Apply styles to the text within the editable area
         area.style.fontWeight = 'bold';
         area.style.color = 'black';
         area.style.fontStyle = 'italic';
     });  });

    //  document.querySelectorAll('a[href^="#registration"]').forEach(anchor => {
    //     anchor.addEventListener('click', function(e) {
    //         e.preventDefault();

    //         document.querySelector(this.getAttribute('href')).scrollIntoView({
    //             behavior: 'smooth'
    //         });
    //     });
    // Function to redirect to the login page (assuming it's login.html)
    function redirectToLogin(event) {
        event.preventDefault(); // Prevent default link behavior
        window.location.href = "login.html"; // Redirect to the login page
    }