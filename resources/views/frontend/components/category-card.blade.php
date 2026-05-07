<a href="{{ route('category.subcategories', $category->slug) }}" class="brand-premium-card category-card-premium reveal shadow-md">
    <div class="category-card-top">
        @php 
            $catImg = $category->image ? asset('uploads/categories/'.$category->image) : 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80'; 
        @endphp
        <img src="{{ $catImg }}" alt="{{ $category->name }}" class="category-card-img" loading="lazy">
    </div>
    <div class="brand-card-bottom-box">
        <h3 class="brand-card-heading">{{ $category->name }}</h3>
        
    </div>
</a>
