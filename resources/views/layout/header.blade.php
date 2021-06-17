<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="Broadshop, broadshop.be, ecommerce, online store" />
    <meta name="description" content="Your number one source of kitchen tools and online scooters in belgium, Welcome to Broadshop" />
    <meta name="author" content="www.broadshop.be" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="base_url" content="{{route('home')}}">
    @auth
        <meta name="user_id" content="{{auth()->user()->id}}">
    @endauth
    <!-- Title -->
    <title>Broadshop - {{$PageTitle ?? 'Get everything your home needs online'}}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{url('public/')}}/images/favicon.png" />
    <!-- inject css start -->
    <link href="{{url('public/')}}/css/theme-plugin.css" rel="stylesheet" />
    <link href="{{url('public/')}}/css/app.css" rel="stylesheet" />
    <!-- inject css end -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FE2F13D6TR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-FE2F13D6TR');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '315451716896873');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=315451716896873&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Google Tag Manager -->
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NGHPW7N');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-197639030-1">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-197639030-1');
    </script>
</head>