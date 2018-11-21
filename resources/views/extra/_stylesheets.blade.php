<style>
  @import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

  * {
    font-family: 'Droid Arabic Kufi', serif;
  }
  body {
    background: #fff9c4 !important;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    height: 100vh; /* Use height insted of min-height for IE 10/11. */
  }
  main {
    /* Prevent shrinking the main area in IE 10/11. */
    -ms-flex-negative: 0;
    flex-shrink: 0;
  }
  .footer {
    padding: 1rem 0;
    margin-top: auto;
    background-color: #f5f5f5;
  }


  /* Custom page CSS
  -------------------------------------------------- */
  /* Not required for template or sticky footer method. */

  .container {
    padding: 0 15px;
  }

  </style>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css" integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">
@yield('stylee')
