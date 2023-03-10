let stripe_key = document.querySelector('meta[name="stripe-key"]').getAttribute('content');
let stripe_intent = document.querySelector('input[id="client_secret"]').getAttribute('value');
let stripe = Stripe(stripe_key);
const appearance = {
    theme: 'night'
  };
let elements = stripe.elements({clientSecret: stripe_intent, appearance});
let card = elements.create('card');
card.mount('#card-element');
