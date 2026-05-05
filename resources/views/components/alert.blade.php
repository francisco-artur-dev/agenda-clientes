
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}

        </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{$error }}</li>
            @endforeach
        </ul>
    </div>
@endif