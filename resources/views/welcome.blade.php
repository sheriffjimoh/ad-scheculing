<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
              
              .btn-primary{
                color: white !important;
              }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
 <?php 
 $current_time = date('h:i:s', strtotime('-5 minute'));
   $date_minus = date('h:i:s ', strtotime('+30 minute'));?>
            <div class="content">
                <div >
                   
                    <h3 class="title m-b-md"> Adverts</h3>
                    <p>advert is showing between  <?php echo $current_time ?> and <?php echo $date_minus ?></p>
               
                </div>     
                    <div class="row">
                        <?php  if (isset($data)) {
                        foreach ($data as $row) {?>  
                        <div class="col-lg-4">
                          <div class="card">
                             <div class="card-body">
                                <img src="{{ url('storage/advert_banners/'.$row->file)}}" width="320"  class="img img-responsive">
                                 
                             </div>
                             <div class="card-footer">
                                 <h3 class="card-title">{{ date('h:i A', strtotime($row->created_at)) }}</h3>
                             </div> 
                          </div>  
                        </div>
                        <?php } }  ?>
                    </div>
             

                <div class="links">
                    <br>
                    <a href="/create" class="btn btn-primary text-white">Create Advert</a>
                </div>
            </div>
        </div>
    </body>
</html>
