@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            <br>

            <!-- Add Teacher -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
                Associar Professor
            </button>

            <!-- Modal -->
            <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Associar Professor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('teacher') }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="sr-only">Name</label>
                                    <select name="name" id="name" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($teacherNames as $teacherNames)
                                            <option
                                                value="{{$teacherNames->userID}}">{{$teacherNames->teacherName}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="subject" class="sr-only">Name</label>
                                    <select name="subject" id="subject" class="form-control"
                                            id="exampleFormControlSelect1">
                                        @foreach($subjects as $subjects)
                                            <option
                                                value="{{$subjects->ongoingSubjectID}}">{{$subjects->subject}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->


            <br>
            <br>


            <table class="table">
                <tr>
                    <th>Professor</th>
                    <th>Disciplinas</th>
                    <th>Ação</th>
                </tr>

                @foreach($teachers as $teachers)
                    <tr>
                        <td>{{ $teachers->teacherName }}</td>
                        <td>{{ $teachers->subject }}</td>

                        <td>

                            <!-- Edit Button -->
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#Model{{$teachers->teachesID}}">
                                Editar
                            </button>

                            <!-- Edit Button -->
                            <form method="get" class="delete_form"
                                  action="{{action('TeacherController@deletePost', $teachers->teachesID)}}">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal Edit-->
                    <div class="modal fade" id="Model{{$teachers->teachesID}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{action('TeacherController@editPost', $teachers->teachesID)}}"
                                          method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="name" class="sr-only">Name</label>
                                            <select name="name" id="name" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                @foreach($teacherNames2 as $teacherNames)
                                                    @if($teachers->teacherName == $teacherNames->teacherName)
                                                        {
                                                        <option selected
                                                                value="{{$teacherNames->userID}}">{{$teacherNames->teacherName}}</option>
                                                        }
                                                    @else{
                                                    <option
                                                        value="{{$teacherNames->userID}}">{{$teacherNames->teacherName}}</option>
                                                    }
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="subjectEdit" class="sr-only">Name</label>
                                            <select name="subjectEdit" id="subjectEdit" class="form-control"
                                                    id="exampleFormControlSelect1">
                                                @foreach($subjects2 as $subjects)
                                                    @if($subjects->subject == $teachers->subject)
                                                        {
                                                        <option selected
                                                                value="{{$subjects->ongoingSubjectID}}">{{$subjects->subject}}</option>
                                                        }
                                                    @else{
                                                    <option
                                                        value="{{$subjects->ongoingSubjectID}}">{{$subjects->subject}}</option>
                                                    }
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar
                                        </button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </table>

        </div>
    </div>
@endsection
