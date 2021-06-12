@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            horário

            <br>

            <!-- Schedule Table -->
            <table>
                <tr>
                    <th>Horas</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                </tr>
                <!-- use $rows as index -->
                <!-- use $hours[$rows] -->
                <!-- ->select('User.name as Username', 'Class.name as Class', 'AcademicYear.status as Status', 'Schedule.start', 'Schedule.end', 'Schedule.weekDay')-->

                @for ($rows = 0; $rows < count($hours); $rows++)
                    <tr>
                        @for ($columns = 0; $columns < 6; $columns++)

                            @if($columns == 0)
                                <th>{{$hours[$rows]}}</th>
                            @endif

                            <?php $trigger = 0; ?>
                            @for($shift = 0; $shift < 6; $shift++)
                                @if($schedules[$shift]->weekDay == $columns && substr_replace($schedules[$shift]->start, "", -3) == $hours[$rows] )
                                    <th> {{$schedules[$shift]->Class}} Turno {{ $schedules[$shift]->name }}</th>
                                        <?php $trigger = 1; ?>
                                @endif

                                @if($schedules[$shift]->weekDay == $columns && substr_replace($schedules[$shift]->end, "", -3) == $hours[$rows] )
                                    <th> {{$schedules[$shift]->Class}} Turno {{ $schedules[$shift]->name }}</th>
                                        <?php $trigger = 1; ?>
                                @endif
                            @endfor

                            @if($columns != 0 && $trigger == 0)
                                <th></th>

                            @endif

                        @endfor
                    </tr>
                @endfor

            </table>

        </div>
    </div>
@endsection
