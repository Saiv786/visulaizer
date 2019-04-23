
@extends('layouts.app')
@section('head')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js"></script>
  <script src="https://use.fontawesome.com/1bc4308c1f.js"></script>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

<style type="text/css">
    *{margin:0;padding:0;box-sizing:border-box;}

body,html{
    height:100%;
}

#wrap{
    height:100%;
    position:relative;
    padding:0px 50px;
    background:#ccc;
}

#coder{
    display:block;
    position:relative;
    width:100%;
    height:400px;
    border:3px solid red;
}
#preview{
    display:block;
    position:relative;
    width:100%;
    height:50%;
    border:3px solid blue;
    background:#ccc;

}
#preview iframe{
        width:100%;
        height:100%;
        border:none;
    }
#status{
    padding:25px 0;
    height:50px;
}
</style>

@endsection
@section('content')
<div id="wrapper">
      @yield('tutorials_list')
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav" style="background-color: #5a5c69;">

@foreach($tutorials as $tutorial)
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('tutorials.show',$tutorial->id)}}">
            <i class="fa fa-book"></i>
            <span>{{ $tutorial->name }}</span></a>
        </li>
        @endforeach
         </ul>


      <div id="content-wrapper">

        <div class="container-fluid">
<div class="container">

<h1>{{ $tutorial->name }}</h1>
<p>{{ $tutorial->description }}</p>
<a href="/tutorials/tryit/{{$tutorial->tryit_code}}" class="btn btn-primary a-btn-slide-text">
               <span><strong><i class="fa fa-edit"></i> Try It</strong></span>
              </a>
             <div id="coder" name=coder>{{$tutorial->tryit_code}}</div>

</div>

<script type="text/javascript">
var editor = ace.edit("coder");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/java");
editor.getSession().setUseWorker(false);
$('#status p').fadeOut();

function myFunction(){
    $('#status p').fadeIn();

    $("#status p").delay(500).fadeOut(200);

    var code = editor.getValue();
    $("#code").val(code);


}



var timeout;

</script>
    <script  src="{{URL::asset('js/compiler/index.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js"></script>
  <script src="https://use.fontawesome.com/1bc4308c1f.js"></script>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

<style type="text/css">
    *{margin:0;padding:0;box-sizing:border-box;}

body,html{
    height:100%;
}

#wrap{
    height:100%;
    position:relative;
    padding:0px 50px;
    background:#ccc;
}

#coder{
    display:block;
    position:relative;
    width:100%;
    height:400px;
    border:3px solid red;
    font-size: 20px;
}
#preview{
    display:block;
    position:relative;
    width:100%;
    height:50%;
    border:3px solid blue;
    background:#ccc;
    overflow-y:auto;

}
#preview iframe{
        width:100%;
        height:100%;
        border:none;
    }
#status{
    padding:25px 0;
    height:50px;
}
</style>

@endsection

{{-- @extends('User.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tutorials</h1>
            <a href="{{ route('tutorials.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="button"></i> Create</a>
        </div>

       <div class="container">
            <form >

                <label for="Topic">Topic</label>
                <input type="text" id="topic" name="topic" value="{{$tutorial->name}}" disabled="">

                <label for="explain">Explain </label>
                <textarea id="description" name="description"  disabled="" style="height:200px">{{$tutorial->description}}</textarea>

                <label for="code">Practice Code</label>
                <a href="/tutorials/tryit/{{$tutorial->tryit_code}}" class="btn btn-primary a-btn-slide-text">
               <span><strong><i class="fa fa-edit"></i> Try It</strong></span>
              </a>
                <textarea id="code" name="code" disabled="" style="height:200px">{{$tutorial->tryit_code}}</textarea>

                <input type="submit" value="Cancel">

            </form>
        </div>

    </div>

    <style>
        input[type=text], select, textarea {
            width: 100%; /* Full width */
            padding: 12px; /* Some padding */
            border: 1px solid #ccc; /* Gray border */
            border-radius: 4px; /* Rounded borders */
            box-sizing: border-box; /* Make sure that padding and width stays in place */
            margin-top: 6px; /* Add a top margin */
            margin-bottom: 16px; /* Bottom margin */
            resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

    </style>

@endsection --}}