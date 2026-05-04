<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    
</head>
<body>

    @include('home.header')
    
    @include('home.herosection')
    
    @include('home.brands')

    @include('home.webstore')

    @include('home.experience')

    @include('home.portfolio')

    @include('home.capabilities')

    @include('home.courselist')

    @include('home.pricing')

    @include('home.team')

    @include('home.reviews')

    @include('home.whyus')
    
    @include('home.status')
    
    @include('home.form')

    @include('home.location')

    @include('home.footer')

    @include('home.stickywhatsapp')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
</body>
</html>