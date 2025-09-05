CREATE TABLE super_admins (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
);

CREATE TABLE page_content (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    page_name VARCHAR(50) NOT NULL UNIQUE,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default super admin (password: admin123)
INSERT INTO super_admins (username, password, email, full_name) 
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@dimplestar.com', 'Super Administrator');

-- Insert default about us content
INSERT INTO page_content (page_name, title, content) 
VALUES ('about_us', 'About Dimple Star Transport', '<h3>Our Story</h3>
<p>Dimple Star Transport was established in 2005 with a vision to provide safe, reliable, and affordable transportation services to communities across the region.</p>

<h3>Our Mission</h3>
<p>To deliver exceptional transportation services that connect people and communities with comfort, safety, and reliability.</p>

<h3>Our Values</h3>
<ul>
    <li><strong>Safety First:</strong> The safety of our passengers is our top priority</li>
    <li><strong>Customer Focus:</strong> We put our customers at the heart of everything we do</li>
    <li><strong>Reliability:</strong> We deliver on our promises with consistent service</li>
    <li><strong>Innovation:</strong> We continuously improve our services and operations</li>
</ul>

<h3>Our Fleet</h3>
<p>We maintain a modern fleet of buses equipped with the latest safety features and amenities to ensure your comfort throughout the journey.</p>');