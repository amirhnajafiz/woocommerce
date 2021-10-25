@section('title', __('-item-'. $item->id))

<x-app-layout>
    <div class="card mx-auto w-75" style="margin-top: 150px;">
        <div class="row m-0 py-5">
            <div class="col-md-4 rounded">
                <img src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" class="rounded" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title h1">
                        {{ $item->name }}
                    </h1>
                    <div class="card-text pb-4 mb-4" style="border-bottom: 1px solid #bababa">
                        Categories:
                        <ul>
                                @forelse($item->categories as $category)
                                    <li>
                                        {{ $category->name }}
                                    </li>
                                @empty
                                    <li>
                                        This item has no categories!
                                    </li>
                                @endforelse
                        </ul>
                    </div>
                    <div class="d-flex flex-col">
                        <span>
                            {{ "Price: " . $item->price }} $
                        </span>
                        <span>
                            {{ "Number: " . $item->number }}
                        </span>
                        <span>
                            <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}"/>
                            <button type="submit" class="btn btn-primary p-1">
                                Add +
                            </button>
                        </form>
                        </span>
                    </div>
                    <p class="card-text">
                        <a href="{{ route('brand.show', $item->brand->id) }}">
                            <small class="text-muted">Brand {{ $item->brand->name }}</small>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row m-0 py-3 border-t border-gray-200">
            <div class="col-12">
                <form action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}" />
                    <label class="h4" for="comment">
                        Comment on this item
                    </label><br />
                    <textarea id="comment" class="rounded p-2 w-100 my-2" name="content" placeholder="Comment ..."></textarea><br />
                    <button type="submit" class="btn btn-success">
                        Commit
                    </button>
                </form>
            </div>
            <div class="col-12 h5 mt-3">
                Comments
            </div>
            <div class="col-12">
                @forelse($item->comments->sortBy('created_at') as $comment)
                    <div class="row m-0 my-4">
                        <div class="col-2">
                            <div class="h5 bg-dark text-white p-2 rounded">
                                {{ $comment->user->name }}
                            </div>
                        </div>
                        <div class="col-10 row m-o p-2 border-b border-gray-200">
                            @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::ADMIN() || \Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::SUPER_ADMIN())
                                <p class="col-11">
                                    {{ $comment->content }}
                                </p>
                                <form class="col-1" action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            @else
                                <p class="col-12">
                                    {{ $comment->content }}
                                </p>
                            @endif
                        </div>
                        <div class="col-12">
                            <small>
                                Commented at: {{ $comment->created_at }}
                            </small>
                        </div>
                    </div>
                @empty
                    <div>
                        No comments yet!
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
