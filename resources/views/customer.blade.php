<!DOCTYPE html>
<html>
    <head>
        <title> ProFix | Customer </title>
        <meta charset="UTF-8">
        <link rel="icon" href="{{asset('images/logo/p.jpg')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/customer.css')}}">
    </head>

    <body>
        <header>
            <!-- Links & Logo -->
            <div class="logo">
                <img src="{{asset('images/logo/logo_transparent.png')}}">
            </div>
            
               <nav>
                <a href="{{route('index')}}"> Home </a>
                <a href="{{route('services')}}"> Services </a>
                <a href="{{route('about')}}"> About Us </a>
                <a href="{{route('contact')}}"> Contact </a>
                </nav>
           
            <div class="sign">
                <div class="signin">
                    <a  href="{{route('login')}}" > Sign In </a>
                </div>
  
                <div class="signup">
                    <a href="{{route('signup')}}" > Not a member ? Sign Up </a>
                </div>
            </div>
        </header>
       
                    @if (Session::has('success'))
                        <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                          <!--  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>-->
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
          <table>
               
              <tr>
                 <th class="th"> Name </th>
                 <th class="th"> Address </th>
                 <th class="th"> Special </th>
                 <th class="th"> Time </th>
                 <th class="th"> Date </th>

                 <th class="th"> Pay </th>
                 <th class="th">Payed ? </th>
              </tr>
            @foreach($orders as $d)
              <tr>
                 <th> {{$d->name}} </th>
                 <th> {{$d->addreess}} </th>
                 <th> {{$d->spec}} </th>
                 <th> {{$d->jobTime}} </th>
                 <th> {{$d->jobDate}} </th>
                 @if($d->price !=0)
                    @if($d->payed == 0)
                    <th><a href="{{route('pay',['id'=>$d->id,'price'=>$d->price])}}" class='btn btn-primary' 
                        style="text-decoration:none; border:1px solid blue;
                        padding:8px 15px;border-radius:5px;background-color:#0f4c81;color:white; font-family:Arial;">Pay</a></th>
                    <th>No</th>
                    @else
                    <th>Done</th>
                    <th>Yes</th>
                    @endif
                @else
                    <th>Wait for price</th>
                @endif
                 
              </tr>
              @endforeach
           </table>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <footer>
            <div class="logo-footer">
                <img src="{{asset('images/logo/logo_transparent.png')}}">
            </div>

            <div class="social">
                <span>We are on social media : </span>
                <a href="https://www.facebook.com" target="_blank"> <img src= "{{asset('images/fbicon.png')}}"></a>
                <a href="https://www.instagram.com" target="_blank"> <img src="{{asset('images//insta.png')}}"> </a>
                <a href="https://www.twitter.com" target="_blank"> <img src="{{asset('images//twitter.png')}}"> </a>
                
            </div>

        </footer>
    </body>

</html>