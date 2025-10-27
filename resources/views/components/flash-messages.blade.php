    @if(Session::has('success_message'))
        <div class="alert alert-success text-center alert-fixed shadow" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('success_message') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger text-center alert-fixed shadow" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('error') }}
        </div>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger text-center alert-fixed shadow" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $error }}
            </div>
        @endforeach
    @endif