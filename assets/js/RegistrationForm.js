 
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("regist-form");

    form.addEventListener("submit", function(e){
        e.preventDefault(); 

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        fetch("../../models/Registration.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Registration successful!");
                window.location.href = "/welcome"; 
            } else {
                alert("Registration failed: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
    });
});