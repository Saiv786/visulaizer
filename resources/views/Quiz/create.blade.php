@extends('layouts.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Quiz Page</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        <form method="post" action="{{route('quiz.store')}}">
            @csrf
        <div class="container">
            <label for="Topic">Question</label>
            <textarea id="code" name="code" placeholder="Write something.." style="height:200px"></textarea>


            <label for="explain">Options</label>
            <input type="text" id="option 1" name="option1" placeholder="option 1">
            <input type="text" id="option 2" name="option2" placeholder="option 2">
            <input type="text" id="option 3" name="option3" placeholder="option 3">
            <input type="text" id="option 4" name="option4" placeholder="option 4">

            <label for="code">Answer</label>
            <input type="text" id="topic" name="topic">

            <input type="submit" value="Save">
            <input type="submit" value="Cancel">


        </div>

    </form>
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
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
    </div>
@endsection