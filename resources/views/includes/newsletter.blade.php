<section class="bg-pink py-9 position-relative overflow-hidden">
    <div class="container">
        <div class="row justify-content-center text-center mb-1">
            <div class="col-lg-6 col-md-10">
                <div class="mb-4">
                    <h2 class="mb-0">Be the first and get weekly updates</h2>
                </div>
                <div class="subscribe-form">
                    <form id="mc-form" class="row align-items-center no-gutters mb-3">
                        <div class="col">
                            <input type="email" class="email form-control input-2 bg-white" id="newsletter-email-value" placeholder="Email Address" required>
                        </div>
                        <div class="col-auto">
                            <button id="signup-to-newsletter" data-location="homepage" data-target="{{route('api.newsletter.signup')}}" class="btn dark-btn overflow-auto">Subscribe</button>
                        </div>
                    </form>
                    <div class="mb-4">
                        <p id="newsletter-output" class="bg-white p-2 border-rounded mt-2 text-danger">That's an error!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
