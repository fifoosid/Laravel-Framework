<a href="/hotels/{{ $hotel->id }}" class="remove-links">
    <div class="container border ">
        <div class="flex max-height">
            <div>
                <h1>{{ $hotel->name }}</h1>

                @for($i = 0; $i < $hotel->stars; $i++)
                    <i class="fa fa-star"></i>
                @endfor

            <h3>Owned by {{ $hotel->owner }}</h3>

            <h4>{{ $hotel->location }}</h4>

            </div>
            
            <div class="image-wrapper">
                <img src="{{ $hotel->imageurl}}" alt="{{ $hotel->name }}">
            </div>

        </div>

        <hr>

        <p>Price for one night per person: {{ $hotel->price }} $</p>
    </div>
</a>