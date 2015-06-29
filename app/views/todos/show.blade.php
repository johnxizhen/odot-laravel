@extends('layouts.main')
@section('content')
    <div class="large-12 columns">
      <h1>{{{ $list->name }}}</h1>
        @foreach ($items as $item)
            @if ($item->completed_on)
                <h4><del>{{{ $item->content }}}</del></h4>
            @else
                <h4>{{{ $item->content }}}</h4>
            @endif
              <ul class="no-bullet button-group">
                <li>
                  {{ link_to_route('todos.items.edit', 'edit', [$list->id, $item->id], ['class' => 'tiny button']) }}
                </li>
                @if ($item->completed_on === NULL)  
                    <li>
                      {{ Form::model($item, ['route' => ['todos.items.complete', $list->id, $item->id], 'method' => 'patch']) }}
                        {{ Form::button('complete', ['type' => 'submit', 'class' => 'tiny success button']) }}
                      {{ Form::close() }}
                    </li>
                @endif
                <li>
                  {{ Form::model($item, ['route' => ['todos.items.destroy', $list->id, $item->id], 'method' => 'delete']) }}
                    {{ Form::button('destroy', ['type' => 'submit', 'class' => 'tiny alert button']) }}
                  {{ Form::close() }}
                </li>
              </ul>
        @endforeach
            <ul class="no-bullet button-group">
                <li>
                  {{ link_to_route('todos.items.create', 'add new item', [$list->id], ['class' => 'button success']) }}
                </li>
            </ul>
      <p>{{ link_to_route('todos.index', 'back', null, ['class' => 'button']) }}</p>
    </div>
@stop