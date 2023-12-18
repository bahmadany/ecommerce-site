// Configuration du bouton PayPal
paypal
  .Buttons({
    createOrder: function (data, actions) {
      // Cette fonction est appelée lorsque l'utilisateur clique sur le bouton PayPal
      // Elle crée la commande avec le montant spécifié (0,10 dollar dans ce cas)
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: "0.02",
            },
          },
        ],
      });
    },
    onApprove: function (data, actions) {
      // Cette fonction est appelée lorsque l'utilisateur approuve la transaction PayPal
      // Elle capture les fonds de la transaction et redirige vers la page "success.html"
      return actions.order.capture().then(function (details) {
        console.log(details); // Affiche les détails de la transaction dans la console
        window.location.replace("success.php"); // Redirige vers la page "success.html"
      });
    },
  })
  .render("#paypal-payment-button"); // Affiche le bouton PayPal dans l'élément avec l'ID 'paypal-payment-button'
