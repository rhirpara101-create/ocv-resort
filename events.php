<?php
$page_title = 'Celebrations & Events - OCV Resort';
$current_page = 'events';
include 'includes/header.php';
?>

<main>
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <img src="assets/img/about.jpg" alt="Events Hero">
        <div class="hero-text">
            <h1 class="reveal">Milestones on the Water</h1>
            <p class="reveal">Where legendary stories begin</p>
        </div>
    </section>

    <section class="section-container">
        <div class="editorial-section reveal">
            <div class="editorial-content">
                <h4 class="minor-heading">BEYOND THE HORIZON</h4>
                <h2 class="sub-heading">Beachfront Weddings</h2>
                <p class="section-desc">Exchange vows where the sea whispers your secrets. Our dedicated wedding planners craft bespoke ceremonies—from intimate sandbank elopements to grand glass-walled gala celebrations.</p>
                <div style="margin-top: 2rem;">
                    <a href="#inquiry" class="btn btn-primary">Start Planning</a>
                </div>
            </div>
            <div class="editorial-image">
                <img src="assets/img/gallery-1.png" alt="Wedding Venue">
            </div>
        </div>

        <div class="editorial-section reveal" style="flex-direction: row-reverse;">
            <div class="editorial-content">
                <h4 class="minor-heading">PROFESSIONAL EXCELLENCE</h4>
                <h2 class="sub-heading">Inspirational Meetings</h2>
                <p class="section-desc">Ignite innovation in our state-of-the-art corporate pavilions. High-speed global connectivity meets the tranquility of the tropics for a retreat that your team will never forget.</p>
                <div style="margin-top: 2rem;">
                    <a href="#inquiry" class="btn btn-secondary">Corporate Packages</a>
                </div>
            </div>
            <div class="editorial-image">
                <img src="assets/img/dining-1.png" alt="Corporate Venue">
            </div>
        </div>
    </section>

    <section id="inquiry" style="background: var(--deep-abyss); padding: 100px 5%;">
        <div class="glass-card reveal" style="max-width: 800px; margin: 0 auto; padding: 4rem;">
            <div class="text-center" style="margin-bottom: 3rem;">
                <h4 class="minor-heading" style="color: var(--vibrant-cyan);">CONCIERGE INQUIRY</h4>
                <h2 class="sub-heading" style="color: white;">Tell Us About Your Event</h2>
            </div>
            
            <form class="modern-form">
                <div class="dashboard-grid" style="grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="sunken-input-group">
                        <input type="text" class="sunken-input" placeholder="Organization/Name" required>
                    </div>
                    <div class="sunken-input-group">
                        <select class="sunken-input" style="background: rgba(0, 44, 58, 0.4); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 14px 20px;">
                            <option value="">Event Type</option>
                            <option value="wedding">Wedding</option>
                            <option value="corporate">Corporate Retreat</option>
                            <option value="anniversary">Anniversary</option>
                        </select>
                    </div>
                </div>
                <div class="sunken-input-group" style="margin-top: 20px;">
                    <textarea class="sunken-input" rows="5" placeholder="Your Vision & Guest Count" required></textarea>
                </div>
                <button type="submit" class="gradient-btn" style="margin-top: 2rem; width: 100%;">Submit Inquiry</button>
            </form>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
