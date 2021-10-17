@section('style')
@stop
<x-app-layout>
    @section('title', $title)
    <h1>
        {{ $item->name }}
    </h1>
</x-app-layout>
