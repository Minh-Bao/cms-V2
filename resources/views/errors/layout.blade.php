<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <style>
            h1{
                z-index: -24;
                left: 33%;
                color: #B640B4 !important;
                font-family: "SourceSansPro-extraLight"!important;	
                font-size: 338px!important;	
                font-weight: 300!important;	
                line-height: 56px!important;	
                text-align: center!important;
                margin: 192px auto;
            }
            @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
            @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
            @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
            h2{
                color: #1B0E4F;	
                font-family: "SourceSansPro-Bold";	
                font-size: 82px;	
                text-align: center;
                margin: 46px auto 0 auto;
            }
            h2+h2{
                color: #1B0E4F;	
                font-family: "SourceSansPro-Bold";	
                font-size: 42px;	
                text-align: center;
                margin: 0 auto 77px auto;
            }
            p{
                color: #1B0E4F;	
                font-family: "SourceSansPro";	
                font-size: 34px;
                text-align: center;
            }
            h1+p{
                margin: 100px auto 0 ;
            
            }
            h2 + p {
                margin: 0 auto 100px;
            }
        </style>
    </head>

    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                @yield('content')
            </div>
        </div>
    </body>
 </html>
    