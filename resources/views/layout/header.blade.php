<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="bootstrap 4, premium, multipurpose, ecommerce, html5, CSS" />
    <meta name="description" content="Bootstrap 4 Landing Page Template" />
    <meta name="author" content="www.themesground.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="base_url" content="{{route('soon')}}">
    @auth
        <meta name="user_id" content="{{auth()->user()->id}}">
    @endauth
    <!-- Title -->
    <title>Broadshop - Coming Soon</title>
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
</head>