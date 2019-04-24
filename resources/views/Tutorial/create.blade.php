
@extends('layouts.app')
@section('head')
{{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> --}}
  {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
  {{-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> --}}
  {{-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet"> --}}
    {{-- <script src="{{ URL::asset('css/sumernote.css') }}" ></script> --}}
    {{-- <script src="{{ URL::asset('css/sumernoteboot.css') }}" ></script> --}}
    <script src="{{ URL::asset('js/sumerjq.js') }}" ></script>
    <script src="{{ URL::asset('js/sumernote.js') }}" ></script>
    <script src="{{ URL::asset('js/sumerboot.js') }}" ></script>
@endsection
@section('content')
    <div class="container">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Tutorials Page</h1>
        </div>

        <div class="container">
<form method="post" action="{{ route('tutorials.store') }}">
    @csrf
                <label for="Topic">Topic</label>
                <input type="text" id="topic" name="topic">

                <label for="explain">Explain</label>
                {{-- <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea> --}}
  <textarea id="summernote" name="description"></textarea>

                <label for="code">Practice Code</label>
                <textarea id="code" name="code" placeholder="Write something.." style="height:200px"></textarea>

                <input type="submit" value="Save">
                <input type="submit" value="Cancel">

            </form>
        </div>


    </div>




<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
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

        /* Style the submit button with a specific background color etc */
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* When moving the mouse over the submit button, add a darker green color */
        input[type=submit]:hover {
            background-color: #45a049;
        }

        /* Add a background color and some padding around the form */
       /* .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }*/
    </style>
@endsection
{{-- @extends('layouts.app')
@section('content')
    <div class="container">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Tutorials Page</h1>
        </div>

        <div class="container">
<form method="post" action="{{ route('tutorials.store') }}">
    @csrf
                <label for="Topic">Topic</label>
                <input type="text" id="topic" name="topic">

                <label for="explain">Explain</label>
                <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>

                <label for="code">Practice Code</label>
                <textarea id="code" name="code" placeholder="Write something.." style="height:200px"></textarea>

                <input type="submit" value="Save">
                <input type="submit" value="Cancel">

            </form>
        </div>


    </div>


@endsection --}}