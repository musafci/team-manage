<!DOCTYPE html>
<html>

    @include('backoffice._partial._head')

<body class="theme-deep-purple">

    @include('backoffice._partial._search')

    @include('backoffice._partial._topbar')

    @include('backoffice._partial._sidebar')

    <section class="content">
        @section('content')
        @show
    </section>

    @include('backoffice._partial._script')

    @include('sweetalert::alert')
</body>

</html>
