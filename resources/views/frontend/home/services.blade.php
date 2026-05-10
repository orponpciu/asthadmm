<section class="services-section" id="services">
    <div class="services-bg-tech"></div>
    <div class="services-orb services-orb-1"></div>
    <div class="services-orb services-orb-2"></div>

    <div class="services-container">
        <div class="services-header">
            <h4>OUR SERVICES</h4>
            <p>Work with our digital marketing agency in Dubai, UAE...</p>
        </div>

        <div class="services-grid">
            @forelse($services as $service)
                <div class="service-card">
                    <div class="service-icon">
                        {{-- Renders the raw SVG code from Filament --}}
                        {!! $service->icon_svg !!}
                        
                        <h3>{{ $service->title }}</h3>
                    </div>
                    
                    <p>{{ $service->description }}</p>
                    
                    {{-- custom_link from your Filament ServiceSectionForm --}}
                    <a href="{{ $service->custom_link ?? url('/service-details/' . $service->id) }}" class="btn-card-know">
                        KNOW MORE ➔
                    </a>
                </div>
            @empty
                <p>No services available at the moment.</p>
            @endforelse
        </div>
    </div>
</section>