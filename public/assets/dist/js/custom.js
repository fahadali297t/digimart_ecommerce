document.querySelectorAll(".image_upload").forEach(function (input) {
    input.addEventListener("change", function () {
        const fileName =
            this.files[0]?.name ||
            this.previousElementSibling.getAttribute("data-default");
        this.previousElementSibling.innerText = fileName;
    });
});
