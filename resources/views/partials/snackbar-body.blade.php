<?php $msg = null; 
	  $color = null; 
      $emoji = null; ?>

@if(Session::has('msg'))
    <?php $msg = Session::get('msg');
          $color = Session::get('color');
          $emoji = Session::get('emoji');?>
@endif

<div id="snackbar" style="background-color: {{ $color or 'black'}}">{{ $msg or ""}}  <span style="font-size: 1.2rem;">{{ $emoji or "" }}</span> </div>

@if (isset($msg))
        <script>
                snackbar();
        </script>
@endif

