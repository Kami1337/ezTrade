<script
src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="{{ env('STRIPE_PUB_KEY') }}"
data-amount={{$cartContent['total']}}
data-name="Stripe Demo"
data-description="Payment description"
data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
data-locale="auto"
data-currency="gbp">
</script>