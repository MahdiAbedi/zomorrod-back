@include('includes/head')


<body>
    <!-- منوی بالا -->
    @include('includes/topMenu')

    <!-- نمایش پیامهای خطا و ... در بالای صفحات  -->
    @include('layouts/flash-message')



    @yield('body')


    
    <!-- منوی پایین -->
    @include('includes/footer')
</body>

</html>