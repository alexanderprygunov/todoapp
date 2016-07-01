@extends('layouts.app')

@section('title', 'Менеджер задач')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <div class="b-margin margin-bottom-20">
                    <div class="b-controls">
                        <div class="controls-item">
                            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i> Добавить
                            </a>
                        </div>
                        <div class="controls-item">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i> Редактировать
                            </a>
                        </div>
                        <div class="controls-item">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Удалить
                                </button>
                            </form>
                        </div>
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{ $task->name }}
                </div>

                <div class="panel-body">

                    <p>{{ $task->desc }}</p>

                    <blockquote>
                        <small><strong>Дата исполнения:</strong> {{ $task->duedate }}</small>
                    </blockquote>

                    <div class="b-controls">
                        <div class="controls-item">
                            @if ($task->completed == false)
                                <span class="label label-danger">В работе</span>
                            @else
                                <span class="label label-success">Выполнено</span>
                            @endif
                        </div>
                        <div class="controls-item">
                            <form action="{{ action('TaskController@completed', $task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}

                                <button type="submit" class="btn btn-default btn-xs">
                                    <i class="fa fa-btn fa-refresh"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection