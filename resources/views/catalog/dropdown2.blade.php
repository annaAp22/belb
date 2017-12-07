<div class="">
    <div class="js-toggle-active" >{{ $category->name }}</div>
    <ul class=" ">
        @foreach($category as $subcat)
            <li >
                <a href="{{ route('catalog', $subcat->sysname) }}">{{ $subcat->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
