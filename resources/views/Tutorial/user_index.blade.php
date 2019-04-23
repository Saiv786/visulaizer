
@extends('layouts.app')
@section('content')

<ul class="sidebar navbar-nav" style="background-color: #5a5c69;">

  @foreach($tutorials as $tutorial)
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('tutorials.show',$tutorial->id)}}">
            <i class="fa fa-book"></i>
            <span>{{ $tutorial->name }}</span></a>
        </li>
      @endforeach
 </ul>
    <div class="container">

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
                        @foreach($tutorials as $each)
                        <tr>
                        <td>{{$each->name}}</td>
                        <td>{{$each->is_active}}</td>
                           <td><div class="">
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
                            </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

    </div>


@endsection