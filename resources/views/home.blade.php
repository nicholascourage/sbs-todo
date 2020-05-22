@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h4 class="text-center"></h4>

                    <form method="POST" action="/guess/make" class="form-horizontal">
                        <div class="form-group form-group-lg {{-- count($errors) ? 'has-error' : '' --}}">
                            
                            <div class="col-sm-10">
                                @csrf
    
                                <input class="form-control" type="text" name="letter_or_word" value="{{ old('letter_or_word') }}"placeholder="Letter or the entire word" autofocus="autofocus"/>
        
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary"{{-- $game->isOver() ? 'disabled' : '' --}}>Guess</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
