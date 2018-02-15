{{--  @if(count($errors))
    <div class="errors">
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors as $error)
                        <li>{{  $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif  --}}

@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors as $error)
                <li>{{ ($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif