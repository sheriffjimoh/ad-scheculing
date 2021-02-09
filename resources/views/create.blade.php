<!DOCTYPE html>
<html>
 <head>
  <title>Ad Scheduling sysytem</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>

<body>
<div class="container">
   <h3 align="center">Create Display AD | <button><a href="/">Home</a>  </button></h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/create_banner') }}">
    {{ csrf_field() }}
    <div class="form-group  col-lg-6 col-offset-3">
    	<div class="form-group">
    		<label class="form-label">Choose Banner</label>
    		 <input type="file" name="file" class="form-control" >
    	</div>

    	<div class="form-group">
    		<label class="form-label">Number Of Times</label>
    		 <input type="number" name="number" class="form-control" >
    	</div>
    	<div class="form-group">
    		 <input type="submit" name="submit" class="btn btn-primary" >
    	</div>
    </div>
   </form>
   
   <br />
   <div class="panel panel-default col-lg-12">
    <div class="panel-heading">
     <h3 class="panel-title">AD Records</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>Banner</th>
        <th>Number Of Times</th>
        <th>Showed Times(N)</th>
        <th>Remain Times(N)</th>
        <th>Show Times</th>
        <th>Created Date</th>
    
         @foreach($data as $row)

         <?php    $show_time = date('h:i A', strtotime($row->created_at))  ?>
       <tr>
        <td> <img src="{{ url('storage/advert_banners/'.$row->file)}}" width="90"> </td>
        <td>{{ $row->number }}</td>
        <td>{{ $row->showed_times  }}</td>
        <td>{{ $row->remain_times }}</td>
        <td>{{ $show_time }}</td>
        <td>{{ $row->created_at}}</td>
     
       </tr>
       @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>
</body>
</html>