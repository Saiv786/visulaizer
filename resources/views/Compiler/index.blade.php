@extends('layouts.app')
@section('content')



<form method="post" action="{{ route('compiler.store') }}">
            @csrf
  <div id="wrap">
<div id="status">
    <p><i class="fa fa-spinner fa-spin fa-fw"></i> generating output</p>
</div>
<div id="coder" name=coder>{{$compiler['code']}}</div>
<input type="hidden" name="code" id="code" >
<input type="submit" value="Run" onclick="myFunction()">
   <input type="submit" value="Cancel">

            </form>
<div id="preview"></div>
    @if (count($compiler) >0)
        <pre>{{$compiler['output']}}</pre>
    @endif
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
    {{-- <script  src="{{URL::asset('js/compiler/index.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{URL::asset('js/vendor/modernizr-2.8.3.min.js')}}"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script> --}}


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
