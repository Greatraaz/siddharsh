<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks for truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Product::truncate();
        ChildCategory::truncate();
        Subcategory::truncate();
        Category::truncate();
        Brand::truncate();
        Setting::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Settings
        Setting::create([
            'site_title' => 'Siddharsh Technologies',
            'site_description' => 'Leading Enterprise IT Infrastructure & Networking Solutions Provider. Expert in Cisco, HP, Dell and more.',
            'email' => 'info@siddharsh.com',
            'phone' => '+91-8826363495',
            'address' => 'Plot No. 45, Second Floor, Okhla Industrial Estate Phase III, New Delhi, Delhi-110020, India',
            'admin_email' => 'admin@siddharsh.com',
            'facebook' => 'https://facebook.com/siddharshtech',
            'twitter' => 'https://twitter.com/siddharshtech',
            'instagram' => 'https://instagram.com/siddharshtech',
            'linkedin' => 'https://linkedin.com/company/siddharshtech',
            'youtube' => 'https://youtube.com/c/siddharshtech',
        ]);

        // 2. Brands
        $brands = [
            ['name' => 'Cisco', 'image' => 'cisco.png'],
            ['name' => 'HPE', 'image' => 'hpe.png'],
            ['name' => 'Dell Technologies', 'image' => 'dell.png'],
            ['name' => 'Juniper Networks', 'image' => 'juniper.png'],
            ['name' => 'Fortinet', 'image' => 'fortinet.png'],
            ['name' => 'Aruba', 'image' => 'aruba.png'],
        ];

        foreach ($brands as $b) {
            Brand::create([
                'name' => $b['name'],
                'slug' => Str::slug($b['name']),
                'image' => $b['image'],
                'status' => 1
            ]);
        }

        // 3. Categories, Subcategories, and Child Categories
        $categories = [
            [
                'name' => 'Networking',
                'image' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=800&q=80',
                'subs' => [
                    [
                        'name' => 'Switches',
                        'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=800&q=80',
                        'children' => [
                            ['name' => 'Campus LAN Switches', 'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=400&q=80'],
                            ['name' => 'Data Center Switches', 'image' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=400&q=80'],
                            ['name' => 'Industrial Ethernet', 'image' => 'https://images.unsplash.com/photo-1563770660941-20978e870e26?auto=format&fit=crop&w=400&q=80']
                        ]
                    ],
                    [
                        'name' => 'Routers',
                        'image' => 'https://images.unsplash.com/photo-1593305841991-05c297ba326b?auto=format&fit=crop&w=800&q=80',
                        'children' => [
                            ['name' => 'Branch Routers', 'image' => 'https://images.unsplash.com/photo-1593305841991-05c297ba326b?auto=format&fit=crop&w=400&q=80'],
                            ['name' => 'Network Edge Routers', 'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=400&q=80']
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Servers & Computing',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=800&q=80',
                'subs' => [
                    [
                        'name' => 'Rack Servers',
                        'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=800&q=80',
                        'children' => [
                            ['name' => '1U Rack Servers', 'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=400&q=80'],
                            ['name' => '2U Rack Servers', 'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=400&q=80']
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Storage Solutions',
                'image' => 'https://images.unsplash.com/photo-1600267175161-cfaa711b4a81?auto=format&fit=crop&w=800&q=80',
                'subs' => [
                    [
                        'name' => 'NAS Storage',
                        'image' => 'https://images.unsplash.com/photo-1600267175161-cfaa711b4a81?auto=format&fit=crop&w=800&q=80',
                        'children' => [
                            ['name' => 'Enterprise NAS', 'image' => 'https://images.unsplash.com/photo-1600267175161-cfaa711b4a81?auto=format&fit=crop&w=400&q=80']
                        ]
                    ],
                ]
            ],
        ];

        foreach ($categories as $catData) {
            $category = Category::create([
                'name' => $catData['name'],
                'slug' => Str::slug($catData['name']),
                'image' => $catData['image'] ?? null,
                'status' => 1
            ]);

            foreach ($catData['subs'] as $subData) {
                $subcategory = Subcategory::create([
                    'category_id' => $category->id,
                    'name' => $subData['name'],
                    'slug' => Str::slug($subData['name']),
                    'image' => $subData['image'] ?? null,
                    'status' => 1
                ]);

                foreach ($subData['children'] as $child) {
                    ChildCategory::create([
                        'category_id' => $category->id,
                        'subcategory_id' => $subcategory->id,
                        'name' => $child['name'],
                        'slug' => Str::slug($child['name']),
                        'image' => $child['image'] ?? null,
                        'status' => 1
                    ]);
                }
            }
        }

        // 4. Products (Realistic)
        $cisco = Brand::where('name', 'Cisco')->first();
        $hpe = Brand::where('name', 'HPE')->first();
        $dell = Brand::where('name', 'Dell Technologies')->first();
        
        $switches = ChildCategory::where('name', 'Campus LAN Switches')->first();
        $rackServers = ChildCategory::where('name', '2U Rack Servers')->first();
        $firewalls = ChildCategory::where('name', 'Next-Gen Firewalls')->first();

        $products = [
            [
                'brand_id' => $cisco->id,
                'category_id' => $switches->category_id,
                'subcategory_id' => $switches->subcategory_id,
                'child_category_id' => $switches->id,
                'name' => 'Cisco Catalyst 9300 Series Switch',
                'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=600&q=80',
                'short_description' => 'Leading stackable enterprise switching platform built for security, IoT, mobility, and cloud.',
                'full_description' => '<p>The Catalyst 9300 Series is the next generation of the industry\'s most widely deployed stackable switching platform. Built for security, IoT, and the cloud, these network switches form the foundation for Cisco Software-Defined Access, our leading enterprise architecture.</p>',
                'specifications' => '{"Ports": "24 or 48 ports", "Stacking": "StackWise-480", "PoE": "UPOE+, UPOE, PoE+", "Forwarding Rate": "154.76 Mpps"}',
                'featured' => 1,
            ],
            [
                'brand_id' => $hpe->id,
                'category_id' => $rackServers->category_id,
                'subcategory_id' => $rackServers->subcategory_id,
                'child_category_id' => $rackServers->id,
                'name' => 'HPE ProLiant DL380 Gen10 Server',
                'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=600&q=80',
                'short_description' => 'The industry-leading 2U server for multi-workload compute in any environment.',
                'full_description' => '<p>The HPE ProLiant DL380 Gen10 server delivers the latest in security, performance and expandability, backed by a comprehensive warranty.</p>',
                'specifications' => '{"CPU": "2x Intel Xeon Scalable", "RAM": "Up to 3.0 TB", "Storage": "Up to 30 SFF / 19 LFF", "Expansion": "8 PCIe 3.0"}',
                'featured' => 1,
            ],
            [
                'brand_id' => $dell->id,
                'category_id' => $rackServers->category_id,
                'subcategory_id' => $rackServers->subcategory_id,
                'child_category_id' => $rackServers->id,
                'name' => 'Dell PowerEdge R740 Rack Server',
                'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=600&q=80',
                'short_description' => 'Optimized for workload acceleration and peak performance for your applications.',
                'full_description' => '<p>The PowerEdge R740 was designed to accelerate application performance leveraging accelerator cards and storage scalability.</p>',
                'specifications' => '{"Memory": "24 DDR4 DIMM slots", "Drive Bays": "Up to 16 x 2.5 inch", "Power": "Titanium 750W", "Management": "iDRAC9"}',
                'featured' => 1,
            ],
        ];

        // Adding more dummy products in a loop for fullness
        for ($i = 1; $i <= 15; $i++) {
            $brand = Brand::inRandomOrder()->first();
            $child = ChildCategory::inRandomOrder()->first();
            $randomImg = 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&w=600&q=80';
            if ($i % 3 == 0) $randomImg = 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=600&q=80';
            if ($i % 5 == 0) $randomImg = 'https://images.unsplash.com/photo-1593305841991-05c297ba326b?auto=format&fit=crop&w=600&q=80';

            Product::create([
                'brand_id' => $brand->id,
                'category_id' => $child->category_id,
                'subcategory_id' => $child->subcategory_id,
                'child_category_id' => $child->id,
                'name' => $brand->name . ' Enterprise Solution Model ' . (100 + $i),
                'slug' => Str::slug($brand->name . ' Enterprise Solution Model ' . (100 + $i) . '-' . uniqid()),
                'thumbnail' => $randomImg,
                'short_description' => 'High-performance ' . $child->name . ' solution for modern enterprise environments.',
                'full_description' => '<p>This ' . $brand->name . ' ' . $child->name . ' offers unmatched performance and reliability.</p>',
                'specifications' => '{"Warranty": "3 Years", "Support": "24/7 Premium", "Performance": "Optimized"}',
                'status' => 1,
                'featured' => rand(0, 1),
            ]);
        }

        foreach ($products as $p) {
            $p['slug'] = Str::slug($p['name']);
            $p['status'] = 1;
            Product::create($p);
        }

        // 5. Dummy Enquiries
        $sampleProducts = Product::take(5)->get();
        $enquiryData = [
            ['name' => 'Rajesh Kumar', 'email' => 'rajesh@example.com', 'phone' => '9876543210', 'message' => 'I am interested in the Cisco Catalyst switches for our new office. Can you provide a quote for 10 units?'],
            ['name' => 'Amit Sharma', 'email' => 'amit.s@corp.in', 'phone' => '9988776655', 'message' => 'Looking for HPE ProLiant DL380 servers. Do you provide installation services in Delhi?'],
            ['name' => 'Suresh Gupta', 'email' => 'suresh@techsolutions.com', 'phone' => '9123456789', 'message' => 'Need pricing for Dell PowerEdge R740. Also, let me know the availability.'],
            ['name' => 'Priya Singh', 'email' => 'priya@itinfra.com', 'phone' => '8800112233', 'message' => 'Interested in Fortinet Next-Gen Firewalls. Can we schedule a demo?'],
        ];

        foreach ($enquiryData as $index => $e) {
            \App\Models\Enquiry::create([
                'product_id' => $sampleProducts[$index]->id ?? null,
                'name' => $e['name'],
                'email' => $e['email'],
                'phone' => $e['phone'],
                'message' => $e['message'],
                'is_read' => $index > 1 ? true : false, // Mix of read and unread
                'created_at' => now()->subDays(rand(1, 5)),
            ]);
        }
    }
}
