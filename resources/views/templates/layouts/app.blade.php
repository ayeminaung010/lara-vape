<!DOCTYPE html>
<html lang="en">
  <head>
    @include("templates.layouts.seo")
    @vite([ 'resources/css/app.css','resources/sass/app.scss','resources/js/app.js'])
    @include('templates.layouts.css')
    @yield("css")
  </head>
  <body>
    @include("templates.layouts.header")
    @if(Auth::check())
        @if (Auth::user()->role == 'user')
        <input type="hidden"  class="user_id" value="{{ Auth::user()->id }}">
        @endif
    @endif
    @yield("content")

    @include("templates.layouts.footer")
    @include("templates.layouts.js")
    @yield("js")
  </body>
</html>
