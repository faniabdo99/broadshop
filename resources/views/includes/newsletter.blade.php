<section class="py-5 newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Join Our Newsletter</h3>
                <p>Get a 25% of coupon when you signup to our newsletter for the first time!</p>
                <form action="#" method="post">
                    <input id="newsletter-email-value" class="form-control border-0" type="email" placeholder="Enter Your Email Here" required>
                    <button id="signup-to-newsletter" data-location="homepage" data-target="{{route('api.newsletter.signup')}}">Signup</button>
                </form>
                <p id="newsletter-output" class="mt-2 text-danger">That's an error!</p>
            </div>
        </div>
    </div>
</section>