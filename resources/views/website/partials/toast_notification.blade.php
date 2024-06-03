<!DOCTYPE html>
<!-- SingleCart Toast notifications -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Toast Notification | CodingNepal</title>
    <link rel="stylesheet" href="{{asset('assets/website/css/iziToast.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN link for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  </head>
  <body>
    <ul class="notifications"></ul>
    <div class="buttons">
      <div class="btn" id="success"></div>
      <div class="btn" id="error">Error</div>
      <div class="btn" id="warning">Warning</div>
      <div class="btn" id="info">Info</div>
    </div>
    <script src="{{asset('assets/website/Js/iziToast.min.js')}}"></script>
  </body>
</html>