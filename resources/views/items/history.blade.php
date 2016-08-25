@extends('layouts.app')

@section('content')
    <!-- Create Item Form... -->
    
    <!-- Bootstrap Boilerplate... -->

   

    <!-- Current Items -->
    @if (count($items) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Item's History
            </div>

            <div class="panel-body">
            @foreach($items as $item)
                @foreach($item->revisionHistory as $history )
                <li>{{ $history->userResponsible()->name }} changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}</li>
                @endforeach
            @endforeach
            </div>
        </div>
    @endif
@endsection