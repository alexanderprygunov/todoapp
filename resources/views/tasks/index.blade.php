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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Задача</th>
                                    <th class="text-center">Статус задачи</th>
                                    <th class="text-center">Срок исполнения</th>
                                    <th class="text-center">Действия</th>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td class="text-center">
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
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-default">{{ $task->duedate }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="b-controls">
                                                <div class="controls-item">
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-xs btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="controls-item">
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="controls-item">
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-xs btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

@endsection