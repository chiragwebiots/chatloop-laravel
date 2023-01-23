<ul>
    @foreach ($childs as $child)
        <li class="jstree-open"
            data-jstree="{&quot;selected&quot;:@if (isset($cat) && $cat->id == $child->id) true @else false @endif,&quot;type&quot;:&quot;file&quot;}">
            @can('update', $child)
                <a href="{{ route('admin.category.edit', $child->id) }}">{{ $child->title }}</a>
            @else
                <a href="javascript:void(0);">{{ $child->title }}</a>
            @endcan
            @if (count($child->childs))
                @include('admin.category.child', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
