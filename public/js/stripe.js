// Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/apikeys
var stripe = Stripe(
    "pk_test_51KUUtYGMq2LaeuYkBemce1L2gxFMgC1iFYWdb6hYjskfSHkJTZT0yMqd0RQP9gNtr2YhJkqmsrXzcmQD36WsTto400crZblUsI"
);
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
var style = {
    base: {
        // Add your base input styles here. For example:
        fontSize: "16px",
        color: "#32325d",
    },
};

// Create an instance of the card Element.
var card = elements.create("card", { style: style });

// Add an instance of the card Element into the `card-element` <div>.
card.mount("#card-element");

// Create a token or display an error when the form is submitted.
var form = document.getElementById("payment-form");
var cardHolderName = document.getElementById("cardholder-name");
var clientSecret = form.dataset.secret;

form.addEventListener("submit", async function (event) {
    event.preventDefault();

    const { setupIntent, error } = await stripe.confirmCardSetup(clientSecret, {
        payment_method: {
            card,
            billing_details: { name: cardHolderName.value },
        },
    });

    if (error) {
        var errorElement = document.getElementById("card-errors");
        errorElement.textContent = error.message;
    } else {
        stripeTokenHandler(setupIntent);
        // console.log(setupIntent);
    }

    //   stripe.createToken(card).then(function(result) {
    //     if (result.error) {
    //       // Inform the customer that there was an error.
    //       var errorElement = document.getElementById('card-errors');
    //       errorElement.textContent = result.error.message;
    //     } else {
    //       // Send the token to your server.
    //       stripeTokenHandler(result.token);
    //     }
    //   });
});

function stripeTokenHandler(setupIntent) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById("payment-form");
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "paymentMethod");
    hiddenInput.setAttribute("value", setupIntent.payment_method);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}
