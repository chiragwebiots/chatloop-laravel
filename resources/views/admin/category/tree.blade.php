<div class="card">
    <div class="card-header d-flex align-items-center">
        <h5>{{ __('Categories') }}</h5>
        @isset($cat)
            <div class="btn-popup ms-auto mb-0">
                <a href="{{ route('admin.category.index') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> {{ __('Create') }}
                </a>
            </div>
        @endisset
    </div>
    <div class="card-body position-relative">
        <div class="form-group row">
            <div class="col-12">
                <input class="form-control" id="search" placeholder="Search node.." type="text">
            </div>
        </div>
        <div class="jstree-loader">
            <img src="{{ asset('admin/images/ajax-loader.gif') }}" class="img-fluid">
        </div>
        <div id="treeBasic" style="display: none">
            <ul>
                @forelse($categories as $category)
                    <li class="jstree-open"
                        data-jstree='{&quot;selected&quot;:@if (isset($cat) && $cat->id == $category->id) true @else false @endif,"icon":"{{ asset('admin/images/menu.png') }}"}'>
                        @can('update', $category)
                            <a href="{{ route('admin.category.edit', $category->id) }}">
                                {{ $category->title }} ({{ count($category->childs) }})
                            </a>
                        @else
                            <a href="javascript:void(0);">
                                {{ $category->title }} ({{ count($category->childs) }})
                            </a>
                        @endcan
                        @if (count($category->childs))
                            @include('admin.category.child', [
                                'childs' => $category->childs,
                                'cat' => $cat,
                            ])
                        @endif
                    </li>
                @empty
                    <li data-jstree='{"icon":"{{ asset('admin/images/menu.png') }}"}'>{{ __('No Categories') }}</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
