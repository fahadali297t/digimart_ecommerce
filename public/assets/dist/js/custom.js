document.querySelectorAll(".image_upload").forEach(function (input) {
    input.addEventListener("change", function () {
        const fileName =
            this.files[0]?.name ||
            this.previousElementSibling.getAttribute("data-default");
        this.previousElementSibling.innerText = fileName;
    });
});

function toggleMenu() {
    // console.log("hello");
    document.getElementById("mobile_nav").classList.toggle("hidden");
}

document.getElementById("categoryNav").onmouseenter = function () {
    document.getElementById("dropdownNav").classList.toggle("hidden");
};

document.getElementById("categoryNav").onmouseleave = function () {
    document.getElementById("dropdownNav").classList.toggle("hidden");
};

// for profile ajax
function addtoCart(event) {
    alert("Product Successfully Added to cart");
    event.preventDefault();
    event.target.closest("form").submit();
}
