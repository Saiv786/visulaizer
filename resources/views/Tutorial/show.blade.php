@extends('layouts.app')

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
	            {{-- <td>{{$each->is_active}}</td> --}}
	            <td>
                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
			        <button type="button" class="btn btn-default btn-sm">
			          <span class="glyphicon glyphicon-remove"></span> Remove
			        </button>

                    </button>
                </td>
	            {{-- <td>
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
	                </div> --}}
	            </td>
          </tr>
          @endforeach
        </tbody>
	</table>
</div>
</div>
@endsection
