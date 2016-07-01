@extends('layouts.app')

@section('title', 'Добавление задачи')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <div class="b-margin margin-bottom-20">
                    <div class="b-controls">
                        <div class="controls-item">
                            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-info">
                                <i class="fa fa-reply"></i> К списку задач
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            @include('common.errors')

            <div class="well">
                <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="task-name" class="col-sm-3 control-label">Задача</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                        <label for="task-desc" class="col-sm-3 control-label">Описание</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3" name="desc" id="task-desc">{{ old('desc') }}</textarea>
                            @if ($errors->has('desc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('duedate') ? ' has-error' : '' }}">
                        <label for="task-duedate" class="col-sm-3 control-label">Срок исполнения</label>
                        <div class="col-sm-6">
                            <input type="text" name="duedate" id="task-duedate" class="form-control" value="{{ old('duedate') }}">
                            @if ($errors->has('duedate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('duedate') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i> Добавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection