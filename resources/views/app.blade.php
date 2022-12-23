<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    {{-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" /> --}}
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite(['resources/js/app.js',"resources/js/Pages/{$page['component']}.vue"]) 
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>
