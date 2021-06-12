@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">

                        <div class="alert alert-success" role="alert">

                        </div>



                    <form class="d-inline" method="POST" action="">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"></button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
