@extends('layouts.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tutorials</h1>
            <a href="{{ route('tutorials.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="button"></i> Create</a>
        </div>

       <div class="container">
            <form method="post" action="{{route('tutorials.update')}}">
            @csrf


                <label for="Topic">Topicss</label>
                <input type="text" id="topic" name="topic" value={{$tutorial->name}} >

                <label for="explain">Explain </label>
                <textarea id="description" name="description"   style="height:200px">{{$tutorial->description}}</textarea>

                <label for="code">Practice Code</label>
                <textarea id="code" name="code"  style="height:200px">{{$tutorial->tryit_code}}</textarea>

                <input type="submit" value="Save">
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
        /*.container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }*/
    </style>

@endsection