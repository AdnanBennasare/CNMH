<!DOCTYPE html>
<html lang="en">
<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
    
@include('layouts.head');
@include('layouts.navbar');
@include('layouts.sidebar');



@yield('section')

@include('layouts.footer');
@include('layouts.links');

</div>
</body>
</html>