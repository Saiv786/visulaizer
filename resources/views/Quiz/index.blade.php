@extends('layouts.app')
{{-- @include('Quiz.modals.head') --}}
@section('content')

    <!-- Begin Page Content -->
{{--     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Quiz Page</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="container">
            <hr>
            <a href="#" class="btn btn-info" role="button">View</a>
            <a href="{{ url('quiz\create') }}" class="btn btn-info" role="button">Create</a>
            <div class="col-md-6 text-right">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Modal">
                Add Quiz
            </button>
            @include('Quiz.modals.create')
        </div>
        </div>


    </div>
 --}}

       <!-- Begin Page Content -->
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quiz</h1>
            <a href="{{ route('quiz.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="button"></i> Create</a>
        </div>

        <div class="table-responsive">
                  <table id="myTable" class="table table-hover">

                    <thead class="thead-inverse">
                      <tr>
                        <th>Question</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($quizz as $each)
                        <tr>
                        <td>{{$each->question}}</td>
                        <td>{{$each->is_active}}</td>
                           <td><div class="">
                              <form action="{{ route('quiz.destroy', $each->id)}}" method="post">
                               @csrf
                               @method('DELETE')
                              <a href="{{ route('quiz.edit',$each->id)}}" class="btn btn-primary a-btn-slide-text">
                               <span><strong><i class="fa fa-edit"></i> Edit</strong></span>
                              </a>
                              <a href='' class="btn btn-primary a-btn-slide-text" data-toggle="modal" data-target="#Modal{{ $each->id }}">
                                {{-- <a href='{{ route('quiz.show',$each->id)}}' class="btn btn-primary a-btn-slide-text" > --}}
                               <span><strong><i class="fa fa-eye"></i> View</strong></span>
                              </a>
                               <button class="btn btn-danger" type="submit"></span><i class="fa fa-trash"></i> Delete</button>
                             </form>
                            </div>
                        </td>
                      </tr>

<!------ Include the above in your HEAD tag ---------->
<div class="example-modal"  >
  <div class="modal fade" id="Modal{{ $each->id }}"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
{{-- <div class="container-fluid bg-info" id="Modal" role="dialog"> --}}
    <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
             {{$each->question}}
        </div>
        <div class="modal-body">
            <div class="col-xs-3 col-xs-offset-5">
               <div id="loadbar" style="display: none;">
                  <div class="blockG" id="rotateG_01"></div>
                  <div class="blockG" id="rotateG_02"></div>
                  <div class="blockG" id="rotateG_03"></div>
                  <div class="blockG" id="rotateG_04"></div>
                  <div class="blockG" id="rotateG_05"></div>
                  <div class="blockG" id="rotateG_06"></div>
                  <div class="blockG" id="rotateG_07"></div>
                  <div class="blockG" id="rotateG_08"></div>
              </div>
          </div>

          <div class="quiz" id="quiz" data-toggle="buttons">
           @foreach($each->answers as $ans)
           <label class="element-animation1 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="{{ $ans->answer }}"> {{ $ans->answer }}</label>
           @endforeach
           {{-- <label class="element-animation1 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="1"> static</label>
           <label class="element-animation2 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="2"> default</label>
           <label class="element-animation3 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="3"> public</label>
           <label class="element-animation4 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="4"> private</label> --}}
       </div>
   </div>
   <div class="modal-footer text-muted">

    <span id="answer"></span>
</div>
</div>
</div>
</div>
</div>
                      @endforeach
                    </tbody>
                  </table>
                </div>

    </div>

@endsection