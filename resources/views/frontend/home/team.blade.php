@if($teamData)
<section class="team-section" id="team">
    <!-- Animated Background Canvas -->
    <canvas id="teamParticleCanvas"></canvas>

    <div class="team-container">
        <!-- Dynamic Section Title -->
        <h2 class="section-title">{{ $teamData->section_title ?? 'MEET OUR TEAM' }}</h2>
        
        <div class="team-grid">
            <!-- Dynamic Team Members Loop -->
            @if(!empty($teamData->members))
                @foreach($teamData->members as $member)
                    <div class="team-card">
                        <div class="member-image">
                            <!-- Dynamic Image with Fallback -->
                            <img src="{{ !empty($member['image']) ? asset('storage/' . $member['image']) : 'https://via.placeholder.com/150/2a1f5c/ffffff?text=Image' }}" 
                                 alt="{{ $member['name'] ?? '' }}" 
                                 onerror="this.src='https://via.placeholder.com/150/2a1f5c/ffffff?text=Image'">
                        </div>
                        <div class="member-info">
                            <!-- Dynamic Name & Role -->
                            <h3>{{ $member['name'] ?? '' }}</h3>
                            <p class="role">{{ $member['role'] ?? '' }}</p>
                            
                            <!-- Dynamic Social Links -->
                            <div class="social-links">
                                @if(!empty($member['facebook']))
                                    <a href="{{ $member['facebook'] }}" aria-label="Facebook" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif
                                
                                @if(!empty($member['twitter']))
                                    <a href="{{ $member['twitter'] }}" aria-label="Twitter" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                                
                                @if(!empty($member['linkedin']))
                                    <a href="{{ $member['linkedin'] }}" aria-label="LinkedIn" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                                
                                @if(!empty($member['instagram']))
                                    <a href="{{ $member['instagram'] }}" aria-label="Instagram" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif