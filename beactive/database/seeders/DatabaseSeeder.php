<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        $proteinPowder = Product::firstOrCreate([
            'name' => 'Protein Powder Supplement',
        ], [
            'description' => 'Various flavored protein powders.',
            'price' => 50.00,
            'stock' => 150,
            'parent_id' => null, // Main product, no parent
        ]);

        $sportEquipment = Product::firstOrCreate([
            'name' => 'Sport Equipment',
        ], [
            'description' => 'Various sport equipment for fitness.',
            'price' => 100.00,
            'stock' => 200,
            'parent_id' => null,
        ]);

        $gymEquipment = Product::firstOrCreate([
            'name' => 'Gym Equipment',
        ], [
            'description' => 'Essential gym equipment for fitness.',
            'price' => 200.00,
            'stock' => 50,
            'parent_id' => null,
        ]);

        $clothing = Product::firstOrCreate([
            'name' => 'Clothing',
        ], [
            'description' => 'Sport clothing for athletes.',
            'price' => 40.00,
            'stock' => 100,
            'parent_id' => null,
        ]);

        $accessories = Product::firstOrCreate([
            'name' => 'Accessories',
        ], [
            'description' => 'Fitness accessories for sports enthusiasts.',
            'price' => 25.00,
            'stock' => 150,
            'parent_id' => null,
        ]);
        // Create sub-products for "Sport Equipment" (ID 5)
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Football',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Baseball Bat',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Volleyball',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Skateboard',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Basketball',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Scoccer Cleats',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Tennis Rack',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Badminton Racket',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Golf Clud',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);
        $sportEquipment->subProducts()->firstOrCreate([
            'name' => 'Yogo Matts',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $sportEquipment->id,
        ]);

        // Create sub-products for "Protein Powder Supplement" (ID 1)
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Whey Protein Powder',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);

        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Fish Oil Omega-3',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);

        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Electrolyte Tablets',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Ashwaganda',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Creatine Monohydrate',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Pre-workout',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Zinc and magnesium',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'BCAA',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Vitamins',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Vitamins C',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);
        // Create sub-products for "Gym Equipment" (ID 2)
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Dumbbells',
        ], [
            'price' => 30.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);

        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Kettlebells',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Treadmill',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Weight Plates',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Barbell',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Execise Mats',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Rowing Machine',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Resistance Bands',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Jump Rope',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);
        $gymEquipment->subProducts()->firstOrCreate([
            'name' => 'Stationary Bike',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);

        // Create sub-products for "Clothing" (ID 3)
        $clothing->subProducts()->firstOrCreate([
            'name' => 'T-Shirts',
        ], [
            'price' => 25.00,
            'stock' => 60,
            'parent_id' => $clothing->id,
        ]);
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Sports Bra',
        ], [
            'price' => 20.00,
            'stock' => 60,
            'parent_id' => $clothing->id,
        ]);
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Shorts',
        ], [
            'price' => 20.00,
            'stock' => 70,
            'parent_id' => $clothing->id,
        ]);

        $clothing->subProducts()->firstOrCreate([
            'name' => 'Sweatband',
        ], [
            'price' => 30.00,
            'stock' => 50,
            'parent_id' => $clothing->id,
        ]);

        $clothing->subProducts()->firstOrCreate([
            'name' => 'Socks',
        ], [
            'price' => 40.00,
            'stock' => 40,
            'parent_id' => $clothing->id,
        ]);
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Hoodies',
        ], [
            'price' => 35.00,
            'stock' => 50,
            'parent_id' => $clothing->id,
        ]);
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Compression Wear',
        ], [
            'price' => 60.00,
            'stock' => 30,
            'parent_id' => $clothing->id,
        ]);
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Joggers',
        ], [
            'price' => 60.00,
            'stock' => 30,
            'parent_id' => $clothing->id,
        ]);
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Base Layer',
        ], [
            'price' => 60.00,
            'stock' => 30,
            'parent_id' => $clothing->id,
        ]);
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Running shoes',
        ], [
            'price' => 60.00,
            'stock' => 30,
            'parent_id' => $clothing->id,
        ]);

        // Create sub-products for "Accessories" (ID 4)
        $accessories->subProducts()->firstOrCreate([
            'name' => 'Water Bottles',
        ], [
            'price' => 10.00,
            'stock' => 100,
            'parent_id' => $accessories->id,
        ]);

        $accessories->subProducts()->firstOrCreate([
            'name' => 'Gym Bag',
        ], [
            'price' => 25.00,
            'stock' => 60,
            'parent_id' => $accessories->id,
        ]);

        $accessories->subProducts()->firstOrCreate([
            'name' => 'Jump Rope',
        ], [
            'price' => 15.00,
            'stock' => 80,
            'parent_id' => $accessories->id,
        ]);

        $accessories->subProducts()->firstOrCreate([
            'name' => 'Foam Roller',
        ], [
            'price' => 30.00,
            'stock' => 70,
            'parent_id' => $accessories->id,
        ]);

        $accessories->subProducts()->firstOrCreate([
            'name' => 'Gym Gloves',
        ], [
            'price' => 20.00,
            'stock' => 50,
            'parent_id' => $accessories->id,
        ]);

        $accessories->subProducts()->firstOrCreate([
            'name' => 'Fitness Tracker',
        ], [
            'price' => 50.00,
            'stock' => 40,
            'parent_id' => $accessories->id,
        ]);
        $accessories->subProducts()->firstOrCreate([
            'name' => 'Resistance Bands',
        ], [
            'price' => 50.00,
            'stock' => 40,
            'parent_id' => $accessories->id,
        ]);
        $accessories->subProducts()->firstOrCreate([
            'name' => 'Head Phones',
        ], [
            'price' => 50.00,
            'stock' => 40,
            'parent_id' => $accessories->id,
        ]);
        $accessories->subProducts()->firstOrCreate([
            'name' => 'Towel',
        ], [
            'price' => 50.00,
            'stock' => 40,
            'parent_id' => $accessories->id,
        ]);
        $accessories->subProducts()->firstOrCreate([
            'name' => 'Sport Watch',
        ], [
            'price' => 50.00,
            'stock' => 40,
            'parent_id' => $accessories->id,
        ]);
    }
}
