<?php
$page_title = 'OCV Resort - Maintenance Notice';
$current_page = 'maintenance';
include '../includes/header.php';
?>

<main class="hero-login">
    <div class="glass-login-card">
        <h2 class="login-brand">OCV Resort</h2>
        <div style="text-align: center; padding: 2rem;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">??.??.????</div>
            <h3 style="color: var(--vibrant-cyan); margin-bottom: 1rem;">Under Maintenance</h3>
            <p class="section-desc">Our booking system is currently undergoing scheduled maintenance.</p>
            <p class="section-desc">We're working to improve your experience!</p>
            
            <div style="margin: 2rem 0; padding: 1.5rem; background: rgba(68, 216, 241, 0.1); border-radius: 12px;">
                <h4 style="color: var(--vibrant-cyan); margin-bottom: 0.5rem;">What's affected:</h4>
                <ul style="text-align: left; color: white;">
                    <li>User login and registration</li>
                    <li>Room booking system</li>
                    <li>Admin dashboard access</li>
                </ul>
            </div>
            
            <div style="margin: 2rem 0;">
                <h4 style="color: var(--vibrant-cyan); margin-bottom: 0.5rem;">Still available:</h4>
                <ul style="text-align: left; color: white;">
                    <li>Browse our rooms and amenities</li>
                    <li>View gallery and spa services</li>
                    <li>Read about our resort</li>
                    <li>Contact information</li>
                </ul>
            </div>
            
            <div style="margin-top: 2rem;">
                <a href="/user/index.php" class="gradient-btn">Browse Our Resort</a>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
