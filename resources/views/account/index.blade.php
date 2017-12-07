@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Account</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('account.update') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                <label for="age" class="col-md-4 control-label">Age</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" class="form-control" name="age" value="{{ old('age', Auth::user()->age) }}">

                                    @if ($errors->has('age'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                                <label for="postcode" class="col-md-4 control-label">Postcode</label>

                                <div class="col-md-6">
                                    <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode', Auth::user()->postcode) }}">

                                    @if ($errors->has('postcode'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                <label for="bio" class="col-md-4 control-label">Bio</label>

                                <div class="col-md-6">
                                    <textarea id="bio" type="text" class="form-control" name="bio" value="{{ old('bio', Auth::user()->bio) }}"></textarea>

                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <select id="gender" class="form-control" name="gender" value="{{ old('gender', Auth::user()->gender) }}">
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="prefer not to say">Prefer not to say</option>
                                    </select>

                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sports') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label">Sports</label>

                                <div class="col-md-6">
                                    <select id="sports" class="form-control" multiple name="sports[]" value="{{ old('sports', Auth::user()->sports) }}">
                                        @foreach($sports as $sport)
                                            <option value="{{ $sport->id }}" {{ Auth::user()->sports->pluck('id')->contains($sport->id)  ? 'selected' : ''}}>{{ $sport->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
