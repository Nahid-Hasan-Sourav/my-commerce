<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>My Commerce - @yield('title')</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

@include('website.includes.style')

</head>

<body>

    {{-- this is for preloader --}}
    <div class="preloader">
        <div class="preloader-inner">
        <div class="preloader-icon">
        <span></span>
        <span></span>
        </div>
        </div>
    </div>

@include('website.includes.header')

@yield('body')

@include('website.includes.footer')

{{-- this is for top to bottom scroll bar --}}
<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>

@include('website.includes.script')

</body>
</html>
