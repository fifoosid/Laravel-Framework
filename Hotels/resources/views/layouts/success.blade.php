@if (session()->has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{{ $request->session->pull($message) }}</li>
        </ul>
    </div>
@endif