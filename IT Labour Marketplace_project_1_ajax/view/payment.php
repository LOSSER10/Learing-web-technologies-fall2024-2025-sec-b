<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <script>
        function validateAndSubmitPayment(event) {
            event.preventDefault();

            const cardNumber = document.getElementById("card-number").value.trim();
            const nameOnCard = document.getElementById("name-on-card").value.trim();
            const expiry = document.getElementById("expiry").value.trim();
            const cvv = document.getElementById("cvv").value.trim();
            const billingAddress = document.getElementById("billing-address").value.trim();
            const saveInfo = document.getElementById("save-info").checked ? 1 : 0;

            // Validate fields
            if (!cardNumber || !nameOnCard || !expiry || !cvv) {
                alert("All fields are required.");
                return;
            }
            if (!/^\d{16}$/.test(cardNumber)) {
                alert("Card number must be 16 digits.");
                return;
            }
            if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiry)) {
                alert("Invalid expiry date format. Use MM/YY.");
                return;
            }
            if (!/^\d{3,4}$/.test(cvv)) {
                alert("CVV must be 3 or 4 digits.");
                return;
            }

            // Create a JSON object
            const paymentData = {
                card_number: cardNumber,
                name_on_card: nameOnCard,
                expiry: expiry,
                cvv: cvv,
                billing_address: billingAddress || "Same as shipping address",
                save_info: saveInfo
            };

            // Send AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../controller/checkpayment.php", true);
            xhr.setRequestHeader("Content-Type", "application/json"); // Indicate JSON payload

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.status === "success") {
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert("An error occurred while processing your payment.");
                    }
                }
            };

            // Convert payment data to JSON string
            xhr.send(JSON.stringify(paymentData));
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout Page</h2>
        <form id="paymentForm" onsubmit="validateAndSubmitPayment(event)">
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" required>

            <label for="name-on-card">Name on Card:</label>
            <input type="text" id="name-on-card" required>

            <label for="expiry">Expiry (MM/YY):</label>
            <input type="text" id="expiry" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" required>

            <label for="billing-address">Billing Address:</label>
            <input type="text" id="billing-address">

            <label>
                <input type="checkbox" id="save-info"> Save Information
            </label><br>

            <button type="submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>
