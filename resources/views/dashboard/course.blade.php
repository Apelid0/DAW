@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            <br>
            <br>
            @foreach ($courses as $course)
                <h1>{{$course}}</h2>
                <div class="row">
                @for($i = 0; $i < 2; $i++)
                    <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$i + 1}}º Ano</h5>

                        <p class="card-text">
                    @for($x = 0; $x < 2; $x++)
                        <h2>{{$i + 1}}º Semestre</h2>

                        @foreach ($subjects as $subject)

                        @if ($course == $subject->course && $subject->grade == $i + 1 && $subject->semester == $x + 1)
                            {{$subject->subject}}
                            <br>
                        @endif

                        @endforeach

                    @endfor
                </p>
            </div>
        </div>
        </div>
                @endfor

                </div>
            @endforeach



        </div>
    </div>
    <br>
@endsection
