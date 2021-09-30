<div>
    <ul>
        @foreach($categories['categories'] as $category)
            <li>
                {{ $category['category']['name'] }}
            </li>
        @endforeach
    </ul>
    <hr />
</div>
