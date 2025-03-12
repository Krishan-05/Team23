function applyDiscount() {
    
    let discountCode = document.getElementById("discount-code").value.trim();
    let subtotalElement = document.getElementById("subtotal");
    let totalElement = document.getElementById("total");
    let discountElement = document.getElementById("discount-amount");
    let discountMessage = document.getElementById("discount-message");

    
    let subtotal = parseFloat(subtotalElement.innerText.replace("£", ""));
    let discountAmount = 0;

    let discountCodes = {
        "STRONGSTART25": 0.25,  // 25% off total order
        "MOVEFORWARD20": 0.20,  // 20% off total order
        "SPRINGFIT15": 0.15,    // 15% off clothing (for now applying to total)
        "STRONGERTOGETHER": "BOGO", // Buy 1 Get 1 Free logic
        "FUELUP20": 0.20,   // 20% off all supplements
        "SUMMERREADY25": 0.25,  // 25% off total order  
    };

    // Check if code is valid
    if (discountCodes[discountCode] !== undefined) {
        if (discountCodes[discountCode] === "BOGO") {
            // Buy 1 Get 1 Free (50% off total if at least 2 items)
            discountAmount = subtotal / 2;
        } else {
            
            discountAmount = subtotal * discountCodes[discountCode];
        }

        discountElement.innerText = `-£${discountAmount.toFixed(2)}`;
        totalElement.innerText = `£${(subtotal - discountAmount + 5).toFixed(2)}`; // Add shipping

        // Display success message
        discountMessage.innerText = "Discount Applied!";
        discountMessage.className = "discount-success";
    } else {
        // Invalid discount code
        discountMessage.innerText = "Invalid discount code.";
        discountMessage.className = "discount-fail";
        discountElement.innerText = "£0.00";
        totalElement.innerText = `£${(subtotal + 5).toFixed(2)}`;
    }
}
