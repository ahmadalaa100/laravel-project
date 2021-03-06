

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin | Orders </title>

  <!-- Favicons -->
  <link href="{{asset('Admin/img/p.jpg')}}" rel="icon">
  <link href="{{asset('Admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('Admin/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('Admin/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
 
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{asset('Admin/css/style.css') }}">
  
  <link href="{{asset('Admin/css/style-responsive.css') }}" rel="stylesheet">
  
  <!-- =======================================================
    
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
     <!--logo start-->
    <a href="{{route('indexAdmin')}}" class="logo"><b>Pro<span>FIX</span></b></a>
    <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
         
          <!-- settings end -->
          
              
          <!-- inbox dropdown end -->
          
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
        <li> 
              <a class="logout" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
            </li>
            <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="{{route('indexAdmin')}}"><img src="{{asset('Admin/img/pro.png')}}" class="img-circle" width="80"></a></p>
          <h3 class="centered">ProFix</h3>
          <br>
          <li class="mt">
            <a class="active" href="{{route('indexAdmin')}}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
         
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Extra Pages</span>
              </a>
            <ul class="sub">
            
            <li><a href="{{route('Addtech')}}">Add Technician</a></li>
            <li><a href="{{route('register')}}">Add Delegate</a></li>
            <li><a href="{{route('register')}}">Add Admin</a></li>
             
            </ul>
          </li>
         
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Tables</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('customers')}}">Orders</a></li>
              <li><a href="{{route('technicians')}}">Technicians</a></li>
              <li><a href="{{route('delegatetable')}}">delegate</a></li>
             
             
            </ul>
          </li>
         
          
         
          <li>
            <a href="{{route('maps')}}">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i ></i>Customers</h3>
        <div class="row">
          
           
          <!-- /col-md-12 -->
          <div class="col-md-12 mt">
            <div class="content-panel">
              <table class="table table-hover">
                <h4><i></i>Orders</h4>
                <hr>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Specialization</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Assign</th>
                    <th>Progress</th>
                   
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($order as $i)
                  <tr>
                    <td>{{$i->name}}</td>
                    <td>{{$i->mail}}</td>
                    <td>{{$i->phone}}</td>
                    <td>{{$i->addreess}}</td>
                    <td>{{$i->spec}}</td>
                    
                    <td>{{$i->jobDate}}</td>
                    <td>{{$i->jobTime}}</td>
                    <td>{{$i->price}}  $</td>
                    <td>
                    <form action="{{route('changeAssign',['id' => $i->id])}}" method='post'>
                    {{csrf_field()}}
                      <select name="tech" id="" style="height:25px;width:200px; border-radius: 5px;">

                        <option value="" selected >{{$i->firstName . ' ' . $i->lastName}}</option>
                        @foreach($tech as $t)
                          @if($t->firstName . ' ' .$t->lastName == $i->firstName . ' ' . $i->lastName)
                          @continue
                          @endif
                          <option value="{{$t->id}}">{{$t->firstName . ' ' .$t->lastName . ' ' . $t->spec }}</option>
                        @endforeach
      
                      </select>
                      <td> <input class='btn btn-primary' type="submit" value="Progress"> </td>

                    </form>
                    </td>
                   
                    <td> <a href="{{route('editOrder',['id'=> $i->id])}}" class='btn btn-info'>Update</a> </td>
                    <td> <a href="{{route('deleteOrder',['id'=> $i->id])}}" class='btn btn-danger'>Delete</a> </td>

                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
        </div>
        {{ $order->links() }}
  
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('Admin/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('Admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('Admin/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('Admin/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('Admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{asset('Admin/lib/common-scripts.js')}}"></script>
  <!--script for this page-->
  
</body>

</html>
