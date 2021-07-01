<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="Broadshop, broadshop.be, ecommerce, online store" />
    <meta name="description" content="{{$PageDescription ?? 'Your number one source of kitchen tools and online scooters in belgium, Welcome to Broadshop'}}" />
    <meta name="author" content="Semicolon Group" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="base_url" content="{{route('home')}}">
    <link rel="canonical" href="{{url()->current()}}" />
    @auth
    <meta name="user_id" content="{{auth()->user()->id}}">
    @endauth
    <!-- Title -->
    <title>Broadshop - {{$PageTitle ?? 'Get everything your home needs online'}}</title>
    <!-- Open Graph data -->
    <meta property="og:title" content="{{$PageTitle ?? 'Broadshop'}}" >
    <meta property="og:type" content="website" >
    <meta property="og:url" content="{{url()->current()}}" >
    <meta property="og:image" content="{{url('public/')}}/images/logo-fill.jpg">
    <meta property="og:description" content="{{$PageDescription ?? 'Your number one source of kitchen tools and online scooters in belgium, Welcome to Broadshop'}}">
    <meta property="og:site_name" content="Broadshop" >
    <!-- Pointless But Needed Twitter Codes -->
    <meta name="twitter:card" content="{{$PageDescription ?? 'Your number one source of kitchen tools and online scooters in belgium, Welcome to Broadshop'}}" >
    <meta name="twitter:site" content="@broadshop.be" >
    <meta name="twitter:creator" content="@broadshop.be" >
    <meta name="twitter:image" content="{{url('public/')}}/images/logo-fill.jpg" >
    <meta name="twitter:title" content="{{$PageTitle ?? 'Broadshop'}}" />
    <meta name="twitter:description" content="{{$PageDescription ?? 'Your number one source of kitchen tools and online scooters in belgium, Welcome to Broadshop'}}" >
    <meta name="application-name" content="Broadshop.be">
    <meta name="msapplication-TileImage" content="{{url('public/')}}/images/favicon.png">
    <meta name="msapplication-TileColor" content="#0090e3">
    <meta name='csrf_token' content="{{csrf_token()}}">
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{url('public/')}}/images/favicon.png" />
    <!-- inject css start -->
    <link href="{{url('public/')}}/css/theme-plugin.css" rel="stylesheet" />
    <link href="{{url('public/')}}/css/app.css" rel="stylesheet" />
    <!-- inject css end -->
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
    <!-- End Facebook Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-197639030-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-197639030-1');
    </script>
</head>