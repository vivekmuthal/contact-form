document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const number = document.getElementById("number").value.trim();
        const subject = document.getElementById("subject").value.trim();
        const message = document.getElementById("message").value.trim();
        const terms = document.getElementById("terms").checked;
        
        if (name === "" || email === "" || number === "" || subject === "" || message === "") {
            alert("All fields are required.");
            isValid = false;
        }
        
        if (!terms) {
            alert("You must agree to the terms.");
            isValid = false;
        }
        
        if (!validateEmail(email)) {
            alert("Enter a valid email address.");
            isValid = false;
        }
        
        if (!/^[0-9]+$/.test(number)) {
            alert("Enter a valid phone number.");
            isValid = false;
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    });

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
});
