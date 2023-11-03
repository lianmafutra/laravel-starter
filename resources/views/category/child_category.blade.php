<li>{{ $child_category->name }}

    @php
        $data = collect([$child_category]);
    @endphp

    @if ($child_category->categories->count() > 0)
     , jumlah <span style="color: green"> {{ $data[0]->categories }}</span>
    @else
        , nilai = {{ $child_category->nilai }}
    @endif



</li>
@if ($child_category->categories)
    <ul>



        @foreach ($child_category->categories as $key => $childCategory)
         

            @include('category.child_category', ['child_category' => $childCategory])
        @endforeach


    </ul>




@endif
