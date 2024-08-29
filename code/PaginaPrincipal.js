var dropdown = document.getElementsByClassName("boton_dropdown");
var i;

for (let i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdown[i].children[2].style.transform = "rotate(0deg)";
            dropdownContent.style.maxHeight = "0%";
            setTimeout(() => {
                dropdownContent.style.display = "none";            
            }, 1000);
        } else {
            dropdownContent.style.display = "block";   
            setTimeout(() => {
                dropdown[i].children[2].style.transform = "rotate(90deg)";
                dropdownContent.style.maxHeight = "100%";
            }, 200);
        }
    });
}

