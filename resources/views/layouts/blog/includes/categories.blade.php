<p class=" fw-bold fs-4  text-left">Categories</p>
<div class="list-group">
    <a href="{{ route('blog.index') }}" class="text-decoration-none   list-group-item list-group-item-action"><i class="fas fa-message mx-2"></i>All Posts</a>
    @foreach ($categories as $category)
    <a href="{{ route('blog.index') }}?category_id={{ $category->id }}" class="text-decoration-none   list-group-item list-group-item-action"><i class="{{ $category->icon }} mx-2"></i>{{ Str::limit($category->name,15)}}</a>

    @endforeach


</div>
