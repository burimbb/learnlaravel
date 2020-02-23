@extends('layouts.app')

@section('content')
    <div>
        Test
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        axios.get('/api/user')
            .then(response => {
                console.log(response.data);
            });
    });
</script>
@endsection