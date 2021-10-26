@section('title', __('-item-'. $item->id))

<x-app-layout>
    <div class="card mx-auto w-75" style="margin-top: 150px;">
        <div class="row m-0 py-5">
            <div class="col-md-4 rounded">
                <img src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" class="rounded"/>
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
                                <li class="bg-dark inline-block text-white rounded p-1">
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
                        <span class="{{ $item->number < 10 ? 'text-danger' : 'text-success' }}">
                            {{ "Left in store: " . $item->number }}
                        </span>
                        <span>
                            <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}"/>
                            <button type="submit" class="btn btn-success p-1">
                                Add +
                            </button>
                        </form>
                        </span>
                    </div>
                    <p class="card-text mt-2">
                        <a href="{{ route('brand.show', $item->brand->id) }}">
                            <small class="text-muted">Presented by: {{ $item->brand->name }}</small>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row m-0 py-3 border-t border-gray-200">
            <div class="col-12">
                <form action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}"/>
                    <label class="h4" for="comment">
                        Comment on this item
                    </label><br/>
                    <textarea id="comment" class="rounded p-2 w-100 my-2" name="content"
                              placeholder="Comment ..."></textarea><br/>
                    <button type="submit" class="btn btn-success">
                        Commit
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-square inline-block" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
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
