{{-- @extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="table-responsive">
      <table id="myTable" class="table table-bordered">
		<thead>
			<tr>
				<td>Topic</td>
				<td>Status</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
            @foreach($tutorials as $each)
            <tr>
	            <td>{{$each->name}}</td>
	            <td>
                    <button class="pd-setting" >Active</button>
                </td>
	            <td>{{$each->is_active}}</td>
	            <td>
                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
			        <button type="button" class="btn btn-default btn-sm">
			          <span class="glyphicon glyphicon-remove"></span> Remove
			        </button>

                    </button>
                </td>
	            <td>
	               	<div class="">


	               		<a href="{{ route('tutorials.edit',$each->id)}}" class="btn btn-primary a-btn-slide-text">
	                   	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
	                   	<span><strong>Edit</strong></span>
	                  	</a>

	                  	<a href='{{ route('tutorials.show',$each->id)}}' class="btn btn-primary a-btn-slide-text">
	                   	<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
	                  	<span><strong>View</strong></span>
	                  	</a>

	                    <form action="{{ route('tutorials.destroy', $each->id)}}" method="post">
		                   @csrf
		                   @method('DELETE')
		                   <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delete</button>
	                    </form>
	                </div>
	            </td>
          </tr>
          @endforeach
        </tbody>
	</table>
</div>
</div>
@endsection
 --}}


 @extends('layouts.app')
@section('content')


    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tutorials</h1>
            <a href="{{ route('tutorials.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="button"></i> Create</a>
        </div>

        <div class="table-responsive">
                  <table id="myTable" class="table table-hover">

                    <thead class="thead-inverse">
                      <tr>
                        <th>Topicss</th>
                        <th>Active</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- <tr ng-repeat="$each in $tutorials"> --}}
                        @foreach($tutorials as $each)
                        <tr>
                        <td>{{$each->name}}</td>
                        <td>{{$each->is_active}}</td>
                           <td><div class="">
                              {{-- <a href="#" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                <span><strong>Add</strong></span>
                              </a> --}}
                              <form action="{{ route('tutorials.destroy', $each->id)}}" method="post">
                               @csrf
                               @method('DELETE')
                              <a href="{{ route('tutorials.edit',$each->id)}}" class="btn btn-primary a-btn-slide-text">
                               <span><strong><i class="fa fa-edit"></i> Edit</strong></span>
                              </a>
                              <a href='{{ route('tutorials.show',$each->id)}}' class="btn btn-primary a-btn-slide-text">
                               <span><strong><i class="fa fa-eye"></i> View</strong></span>
                              </a>
                               <button class="btn btn-danger" type="submit"></span><i class="fa fa-trash"></i> Delete</button>
                             </form>
                              {{-- <a href='{{ route('tutorials.destroy',$each->id)}}' class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                <span><strong>Delete</strong></span>
                              </a> --}}
                            </div>
                        </td>
                      </tr>
                      {{-- </tr> --}}
                      @endforeach
                    </tbody>
                  </table>
                </div>

    </div>

   {{--  <style>
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
    </style> --}}

@endsection