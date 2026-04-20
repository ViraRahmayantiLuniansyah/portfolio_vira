<?php

/**
 * DATABASE SEEDER
 * File: database/seeders/DatabaseSeeder.php
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SkillSeeder::class,
            CertificateSeeder::class,
            ProjectSeeder::class,
            SiteSettingSeeder::class,
        ]);
    }
}

/**
 * SKILL SEEDER
 * File: database/seeders/SkillSeeder.php
 * Command: php artisan make:seeder SkillSeeder
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            [
                'category' => 'Frontend Development',
                'skill_name' => 'HTML & CSS',
                'description' => 'HTML5, CSS3, Sass, Tailwind CSS, Responsive Design',
                'proficiency' => 90,
                'icon' => '🎨',
                'display_order' => 1,
            ],
            [
                'category' => 'Frontend Development',
                'skill_name' => 'JavaScript',
                'description' => 'Vanilla JS, ES6+, DOM Manipulation, Async/Await',
                'proficiency' => 85,
                'icon' => '⚡',
                'display_order' => 2,
            ],
            [
                'category' => 'Frontend Development',
                'skill_name' => 'React.js',
                'description' => 'React, Hooks, Context API, Redux',
                'proficiency' => 80,
                'icon' => '⚛️',
                'display_order' => 3,
            ],
            [
                'category' => 'Backend Development',
                'skill_name' => 'Laravel',
                'description' => 'Laravel 10, Eloquent ORM, API Development',
                'proficiency' => 85,
                'icon' => '🔴',
                'display_order' => 4,
            ],
            [
                'category' => 'Backend Development',
                'skill_name' => 'PHP',
                'description' => 'PHP 8, OOP, MVC Pattern',
                'proficiency' => 90,
                'icon' => '🐘',
                'display_order' => 5,
            ],
            [
                'category' => 'Database',
                'skill_name' => 'MySQL',
                'description' => 'MySQL, Database Design, Query Optimization',
                'proficiency' => 85,
                'icon' => '🗄️',
                'display_order' => 6,
            ],
            [
                'category' => 'Tools & Others',
                'skill_name' => 'Git & GitHub',
                'description' => 'Version Control, Collaboration, CI/CD',
                'proficiency' => 80,
                'icon' => '📦',
                'display_order' => 7,
            ],
            [
                'category' => 'Tools & Others',
                'skill_name' => 'UI/UX Design',
                'description' => 'Figma, Adobe XD, User Interface Design',
                'proficiency' => 75,
                'icon' => '🎭',
                'display_order' => 8,
            ],
        ];

        DB::table('skills')->insert($skills);
    }
}

/**
 * CERTIFICATE SEEDER
 * File: database/seeders/CertificateSeeder.php
 * Command: php artisan make:seeder CertificateSeeder
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'Web Development Bootcamp',
                'description' => 'Completed comprehensive web development course covering HTML, CSS, JavaScript, and modern frameworks',
                'issuer' => 'Udemy',
                'issue_date' => '2023-06-15',
                'display_order' => 1,
            ],
            [
                'title' => 'Laravel Professional',
                'description' => 'Advanced Laravel development certification with focus on API development and best practices',
                'issuer' => 'Laracasts',
                'issue_date' => '2023-09-20',
                'display_order' => 2,
            ],
            [
                'title' => 'JavaScript Advanced',
                'description' => 'Advanced JavaScript and ES6+ features, including async programming and design patterns',
                'issuer' => 'Coursera',
                'issue_date' => '2023-03-10',
                'display_order' => 3,
            ],
            [
                'title' => 'UI/UX Design Fundamentals',
                'description' => 'User interface and user experience design principles and best practices',
                'issuer' => 'Google',
                'issue_date' => '2022-11-05',
                'display_order' => 4,
            ],
        ];

        DB::table('certificates')->insert($certificates);
    }
}

/**
 * PROJECT SEEDER
 * File: database/seeders/ProjectSeeder.php
 * Command: php artisan make:seeder ProjectSeeder
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'Full-featured e-commerce website with shopping cart, payment gateway integration, and admin dashboard',
                'technologies' => 'Laravel, MySQL, Vue.js, Tailwind CSS, Stripe API',
                'status' => 'completed',
                'display_order' => 1,
            ],
            [
                'title' => 'Task Management System',
                'description' => 'Collaborative task management application with real-time updates and team collaboration features',
                'technologies' => 'Laravel, WebSocket, MySQL, Bootstrap',
                'status' => 'completed',
                'display_order' => 2,
            ],
            [
                'title' => 'Blog CMS',
                'description' => 'Content management system for blogging with SEO optimization and multi-author support',
                'technologies' => 'Laravel, MySQL, TinyMCE, Tailwind CSS',
                'status' => 'ongoing',
                'display_order' => 3,
            ],
            [
                'title' => 'Portfolio Template',
                'description' => 'Modern and responsive portfolio template for creative professionals and developers',
                'technologies' => 'HTML, CSS, JavaScript, PHP',
                'status' => 'completed',
                'display_order' => 4,
            ],
            [
                'title' => 'Inventory Management',
                'description' => 'Complete inventory management system with barcode scanning and reporting',
                'technologies' => 'Laravel, MySQL, Chart.js, Bootstrap',
                'status' => 'ongoing',
                'display_order' => 5,
            ],
            [
                'title' => 'Learning Management System',
                'description' => 'Online learning platform with video courses, quizzes, and progress tracking',
                'technologies' => 'Laravel, MySQL, Vue.js, Vimeo API',
                'status' => 'planned',
                'display_order' => 6,
            ],
        ];

        DB::table('projects')->insert($projects);
    }
}

/**
 * SITE SETTING SEEDER
 * File: database/seeders/SiteSettingSeeder.php
 * Command: php artisan make:seeder SiteSettingSeeder
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['setting_key' => 'site_title', 'setting_value' => 'VIRA R - Portfolio', 'description' => 'Website title'],
            ['setting_key' => 'site_description', 'setting_value' => 'Web Developer & Designer Portfolio', 'description' => 'Website description'],
            ['setting_key' => 'profile_name', 'setting_value' => 'VIRA R', 'description' => 'Profile name'],
            ['setting_key' => 'profile_title', 'setting_value' => 'Web Developer & Designer', 'description' => 'Profile title/tagline'],
            ['setting_key' => 'profile_bio', 'setting_value' => 'Passionate about creating beautiful and functional websites with modern technologies. Specialized in Laravel development and responsive design.', 'description' => 'Profile biography'],
            ['setting_key' => 'about_text', 'setting_value' => 'Hello! I\'m VIRA R, a passionate web developer with expertise in creating modern and responsive websites. I love turning ideas into reality through clean code and beautiful design.', 'description' => 'About section text'],
            ['setting_key' => 'email', 'setting_value' => 'vira@example.com', 'description' => 'Contact email'],
            ['setting_key' => 'phone', 'setting_value' => '+62 812 3456 7890', 'description' => 'Contact phone'],
            ['setting_key' => 'location', 'setting_value' => 'Bogor, Indonesia', 'description' => 'Location'],
            ['setting_key' => 'education', 'setting_value' => 'Computer Science', 'description' => 'Education background'],
            ['setting_key' => 'experience', 'setting_value' => '3+ Years', 'description' => 'Years of experience'],
            ['setting_key' => 'freelance', 'setting_value' => 'Available', 'description' => 'Freelance availability'],
            ['setting_key' => 'whatsapp_url', 'setting_value' => 'https://wa.me/6281234567890', 'description' => 'WhatsApp contact URL'],
            ['setting_key' => 'instagram_url', 'setting_value' => 'https://instagram.com/virar', 'description' => 'Instagram profile URL'],
            ['setting_key' => 'tiktok_url', 'setting_value' => 'https://tiktok.com/@virar', 'description' => 'TikTok profile URL'],
            ['setting_key' => 'linkedin_url', 'setting_value' => 'https://linkedin.com/in/virar', 'description' => 'LinkedIn profile URL'],
            ['setting_key' => 'github_url', 'setting_value' => 'https://github.com/virar', 'description' => 'GitHub profile URL'],
            ['setting_key' => 'twitter_url', 'setting_value' => 'https://twitter.com/virar', 'description' => 'Twitter profile URL'],
        ];

        DB::table('site_settings')->insert($settings);
    }
}