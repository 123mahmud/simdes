<!DOCTYPE html>
<html>
@include('layouts._head')

@yield('extra_style')
<body>

	<div class="main-wrapper">
    <div class="app" id="app">
    	@include('layouts._sidebar')

    	@yield('content')

    	@include('layouts._footer')
    </div>
  </div>
  @include('layouts._script')

  @yield('extra_script')
</body>
</html>