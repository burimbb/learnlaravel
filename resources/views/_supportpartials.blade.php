<div>
    @foreach ($supports as $item)
        <ul class="list-group">
            <li class="list-group-item">Name: {{ $item->name }}</li>
            <li class="list-group-item">Email: {{ $item->email }}</li>
            <li class="list-group-item">Message: {{ $item->message }}</li>
        </ul>
        <hr>
    @endforeach
</div>