<!-- inject js start -->
    <script src="{{url('public/')}}/js/jquery-3.5.1.min.js"></script>
    <script src="{{url('public/')}}/js/popper.min.js"></script>
    <script src="{{url('public/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('public/')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('public/')}}/js/light-slider.js"></script>
    <script src="{{url('public/')}}/js/parallax.js"></script>
    <script src="{{url('public/')}}/js/magnific-popup.min.js"></script>
    <script src="{{url('public/')}}/js/jquery.countdown.min.js"></script>
    <script src="{{url('public/')}}/js/jquery.dd.min.js"></script>
    <script src="{{url('public/')}}/js/validator.js"></script>
    <script src="{{url('public/')}}/js/wow.js"></script>
    <script src="{{url('public/')}}/js/app.js?v=1"></script>
<!-- inject js end -->
<!-- Messenger Chat plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "106290844978466");
  chatbox.setAttribute("attribution", "page_inbox");
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v10.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/nl_NL/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>