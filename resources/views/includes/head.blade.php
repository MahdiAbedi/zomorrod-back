<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="MahdiAbedi220@yahoo.com">
    @yield('meta')
    
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/mahdi.css">
    <link rel="icon" href="/img/favicon.gif" type="image/gif" sizes="64x64">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('style')

</head>
