let container = document.getElementById("container");

toggle = () => {
    container.classList.toggle("sign-in");
    container.classList.toggle("sign-up");
};

setTimeout(() => {
    container.classList.add("sign-in");
}, 200);



document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("container");
    const roleRadios = document.querySelectorAll('input[name="role"]');
    const lessorFields = document.getElementById("lessorFields");

    // Toggle between sign-in and sign-up
    const toggle = () => {
        container.classList.toggle("sign-in");
        container.classList.toggle("sign-up");
    };

    setTimeout(() => {
        container.classList.add("sign-in");
    }, 200);

    // Role-based field display
    roleRadios.forEach((radio) => {
        radio.addEventListener("change", function () {
            lessorFields.style.display =
                this.value === "lessor" ? "block" : "none";
        });
    });

    // Initialize fields based on current selection
    const selectedRole = document.querySelector('input[name="role"]:checked');
    lessorFields.style.display =
        selectedRole && selectedRole.value === "lessor" ? "block" : "none";

    // Form validation for registration
    document
        .getElementById("registerForm")
        .addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent form submission

            let isValid = true;

            // Clear previous error messages
            document
                .querySelectorAll(".error-message")
                .forEach((el) => (el.textContent = ""));

            // Validate username
            const registerUsername =
                document.getElementById("registerUsername");
            const errorUsername = document.getElementById("errorUsername");
            if (registerUsername.value.trim() === "") {
                isValid = false;
                errorUsername.textContent = "Username is required.";
            }

            // Validate email
            const registerEmail = document.getElementById("registerEmail");
            const errorEmail = document.getElementById("errorEmail");
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(registerEmail.value.trim())) {
                isValid = false;
                errorEmail.textContent = "Invalid email address.";
            }

            // Validate password
            const registerPassword =
                document.getElementById("registerPassword");
            const errorPassword = document.getElementById("errorPassword");
            if (registerPassword.value.length < 8) {
                isValid = false;
                errorPassword.textContent =
                    "Password must be at least 8 characters long.";
            }

            // Validate password confirmation
            const registerConfirmPassword = document.getElementById(
                "registerConfirmPassword"
            );
            const errorConfirmPassword = document.getElementById(
                "errorConfirmPassword"
            );
            if (registerPassword.value !== registerConfirmPassword.value) {
                isValid = false;
                errorConfirmPassword.textContent = "Passwords do not match.";
            }

            // Validate role selection
            const roleInputs = document.querySelectorAll('input[name="role"]');
            const errorRole = document.getElementById("errorRole");
            let roleSelected = false;
            roleInputs.forEach(function (input) {
                if (input.checked) {
                    roleSelected = true;
                }
            });
            if (!roleSelected) {
                isValid = false;
                errorRole.textContent = "Please select a role.";
            }

            // Validate lessor fields if 'lessor' role is selected
            if (
                document.querySelector('input[name="role"]:checked')?.value ===
                "lessor"
            ) {
                const registerAddress =
                    document.getElementById("registerAddress");
                const errorAddress = document.getElementById("errorAddress");
                const registerPhone = document.getElementById("registerPhone");
                const errorPhone = document.getElementById("errorPhone");

                // Validate address
                if (registerAddress.value.trim() === "") {
                    isValid = false;
                    errorAddress.textContent = "Address is required.";
                }

                // Validate phone
                const phonePattern = /^[0-9]{10}$/; // Assuming phone should be 10 digits
                if (!phonePattern.test(registerPhone.value.trim())) {
                    isValid = false;
                    errorPhone.textContent =
                        "Invalid phone number. It should be 10 digits.";
                }
            }

            // If the form is valid, submit it
            if (isValid) {
                document.getElementById("registerForm").submit();
            }
        });

    // Form validation for login
    document
        .getElementById("loginForm")
        .addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent form submission

            let isValid = true;

            // Clear previous error messages
            document
                .querySelectorAll(".error-message")
                .forEach((el) => (el.textContent = ""));

            // Validate email
            const loginEmail = document.getElementById("loginEmail");
            const errorLoginEmail = document.getElementById("errorLoginEmail");
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(loginEmail.value.trim())) {
                isValid = false;
                errorLoginEmail.textContent = "Invalid email address.";
            }

            // Validate password
            const loginPassword = document.getElementById("loginPassword");
            const errorLoginPassword =
                document.getElementById("errorLoginPassword");
            if (loginPassword.value.length < 8) {
                isValid = false;
                errorLoginPassword.textContent =
                    "Password must be at least 8 characters long.";
            }

            // If the form is valid, submit it
            if (isValid) {
                document.getElementById("loginForm").submit();
            }
        });

    // Validate email uniqueness with AJAX
    const registerEmail = document.getElementById("registerEmail");
    const errorEmail = document.getElementById("errorEmail");

    registerEmail.addEventListener("blur", function () {
        const email = registerEmail.value.trim();
        if (email) {
            fetch("{{ route('check.email') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ email: email }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.exists) {
                        errorEmail.textContent = "Email is already in use.";
                    } else {
                        errorEmail.textContent = "";
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });
});
