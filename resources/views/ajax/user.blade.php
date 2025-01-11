@foreach ($users as $user)
<div class="card mb-2"> 
    <div class="card-body">{{ $user->id }} 
        <h5 class="card-title">{{ $user->name }}</h5>
        {!! $user->email !!}
    </div>
</div>
@endforeach