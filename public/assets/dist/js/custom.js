const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

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

function addtoCart(event) {
    alert("Product Successfully Added to cart");
    event.preventDefault();
    event.target.closest("form").submit();
}

// for update quantity and price

function desc(id, event) {
    event.preventDefault();
    fetch("/update-cart", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({
            id: id,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            // Update quantity in counter span
            console.log(data);
        })
        .catch((error) => console.error("Error:", error));
}
function inc(id) {
    console.log(id);
}

function remove(event, id) {
    fetch("/delete-item", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({
            id: id,
        }),
    })
        .then((res) => res)
        .then((data) => {
            // Update quantity in counter span
            // console.log(data);
            location.href = "cart";
        })
        .catch((error) => console.error("Error:", error));
}
// for increment
function inc(event, id, inc) {
    let total = document.getElementById("total_" + id);
    let totalprice = 0;
    // console.log($total.innerText);
    event.preventDefault();
    fetch("/update-cart-price", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({
            id: id,
            inc: inc,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            // Update quantity in counter span
            // console.log(data.cart[id].price);
            total.innerText =
                "Rs. " + data.cart[id].price * data.cart[id].product_quantity;

            for (let key in data.cart) {
                let element = data.cart[key];
                totalprice += element.price * element.product_quantity;
            }

            document.getElementById("grandTotal").innerText =
                "Rs. " + totalprice;
            document.getElementById("subtotal").innerText = "Rs. " + totalprice;

            document.getElementById("counter_" + id).innerText =
                data.cart[id].product_quantity;
            document.getElementById("total_hidden").value = totalprice;
        })
        .catch((error) => console.error("Error:", error));
}

// desc

function desc(event, id, desc) {
    let total = document.getElementById("total_" + id);
    let totalprice = 0;
    // console.log($total.innerText);
    event.preventDefault();
    fetch("/update-cart-price", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({
            id: id,
            desc: desc,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            // Update quantity in counter span
            // console.log(data.cart[id].price);
            total.innerText =
                "Rs. " + data.cart[id].price * data.cart[id].product_quantity;

            for (let key in data.cart) {
                let element = data.cart[key];
                totalprice += element.price * element.product_quantity;
            }

            document.getElementById("grandTotal").innerText =
                "Rs. " + totalprice;
            document.getElementById("subtotal").innerText = "Rs. " + totalprice;

            document.getElementById("counter_" + id).innerText =
                data.cart[id].product_quantity;
            document.getElementById("total_hidden").value = totalprice;
            // subtotal
        })
        .catch((error) => console.error("Error:", error));
}

document.querySelectorAll('input[name="paymentMethod"]').forEach((elem) => {
    elem.addEventListener("change", function (event) {
        // console.log(`Selected: ${event.target.value}`);
        if (event.target.value === "card") {
            document.getElementById("card_label").classList.add("selected");
            document.getElementById("cod_label").classList.remove("selected");
        } else {
            document.getElementById("cod_label").classList.add("selected");
            document.getElementById("card_label").classList.remove("selected");
        }
    });
});

// for updating the status of payment:

function updateOrder(id, val) {
    fetch("/admin/orders/update", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({
            id: id,
            val: val,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            if (data == "Shipped") {
            } else {
                document.getElementById("payment_status").innerText = "Paid";
            }
        })
        .catch((error) => console.error("Error:", error));
}


