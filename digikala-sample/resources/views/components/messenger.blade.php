<div {{ $attributes }}>
    @forelse($messages as $message)
        <div class="alert alert-{{ $message->type }}" role="alert" id="message-{{ $message->id }}">
            <p>
                {{ $message->message }}
            </p>
            <small>
                {{ $message->created_at }}
            </small>
            <button
                class="float-right"
                onclick="read_message('{{ route('message.destroy', $message->id) }}', 'message-{{ $message->id }}')">
                X
            </button>
        </div>
    @empty
        <div class="alert alert-dark" role="alert">
            No messages!
        </div>
    @endforelse
</div>
