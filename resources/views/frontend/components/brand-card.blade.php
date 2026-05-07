<div class="brand-premium-card brand-card-small reveal h-100 shadow-md">
    <div class="brand-card-top">
        @if($brand->image)
            <img src="{{ asset('uploads/brands/'.$brand->image) }}" alt="{{ $brand->name }}" class="brand-card-main-img" loading="lazy">
        @else
            <div class="brand-card-placeholder-img">
                {{ strtoupper(substr($brand->name,0,2)) }}
            </div>
        @endif
    </div>
    <div class="brand-card-bottom-box" style="flex: 1; display: flex; flex-direction: column;">
        <h3 class="brand-card-heading text-white">{{ $brand->name }}</h3>
        <div class="mt-auto">
            <a href="{{ route('brand.details', $brand->slug) }}" class="brand-card-btn">
                Read More
            </a>
        </div>
    </div>
</div>


