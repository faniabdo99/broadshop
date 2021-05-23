@include('layout.header')
<style>
    body{
        height: 100vh;
        background: url("{{url('public/images/soon.jpg')}}") no-repeat center center;
        background-size: cover;
        font-family: 'Poppins' , sans-serif;
    }
    .newsletter-cta{
        background-color: rgba(0,0,0,0.5);
        padding: 30px;
        text-align: left;
        height: 100vh;
        flex-direction: column;
        justify-content: space-between;
    }
    .newsletter-cta h1{
        font-size: 2em;
        color:#fff;
    }
    .newsletter-cta p{
        font-size: 0.9em;
        color:#fff;
    }
    .flexbox{
        max-width: 100%;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    .newsletter-cta form{
        margin-bottom: 30px;
    }
    .newsletter-cta form label{
        font-size: 0.9em;
        color:#fff;
    }
    .newsletter-cta form input{
        background: rgba(0,0,0,0.5);
        border:0;
        padding: 10px;
        border-radius: 4px;
        color:#fff;
        width: 90%;
    }
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #fff;
        opacity: 1; /* Firefox */
        font-size: 0.8em;
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #fff;
    }
    ::-ms-input-placeholder { /* Microsoft Edge */
        color: #fff;
    }
    .newsletter-cta form button{
        border:0;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 0.8em;
    }
    .social-media{
        padding: 0;
    }
    .social-media li{
        display: inline;
        margin-right: 15px;
    }
    .social-media li a{
        color: #fff;
        transition: all ease 0.3s;
    }
    .social-media li a:hover{
        color: #3a5c91;
        transition: all ease 0.3s;
    }
    #newsletter-output{
        display: none;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="newsletter-cta d-flex">
                    <div>
                        <h1 class="d-none">Broadshop.be</h1>
                        <img class="mb-5" src="{{url('public/images/footer-logo.png')}}" width="250" alt="Broadsgop.be Logo">
                        <p>Welkom bij Boardshop.be, we bouwen aan een geweldige website!  Blijf op de hoogte en bereid u voor op de komende lanceringskortingen</p>
                    </div>
                    <div>
                        <form>
                            <label>Ontvang 20% ​​korting op uw eerste bestelling</label>
                            <div class="flexbox">
                                <input  id="newsletter-email-value" type="email" placeholder="Vul je email hier in" required>
                                <button id="signup-to-newsletter" data-location="soon-page" data-target="{{route('api.newsletter.signup')}}">Aanmelden</button>
                            </div>
                            <p id="newsletter-output" class="mt-2 text-danger">That's an error!</p>
                        </form>
                        <p>Volg ons:</p>
                        <ul class="social-media">
                            <li><a href="https://www.facebook.com/broadshop.be" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/Broadshop.be/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.scripts')
</body>
</html>