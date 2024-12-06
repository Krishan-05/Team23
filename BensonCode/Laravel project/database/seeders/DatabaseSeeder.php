<?php


use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create main products only if they don't already exist
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

        // Create sub-products for "Protein Powder Supplement" (ID 1)
        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Vanilla Flavored Protein Powder',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);

        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Chocolate Flavored Protein Powder',
        ], [
            'price' => 55.00,
            'stock' => 100,
            'parent_id' => $proteinPowder->id,
        ]);

        $proteinPowder->subProducts()->firstOrCreate([
            'name' => 'Strawberry Flavored Protein Powder',
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
            'name' => 'Free Weights',
        ], [
            'price' => 40.00,
            'stock' => 50,
            'parent_id' => $gymEquipment->id,
        ]);

        // Create sub-products for "Clothing" (ID 3)
        $clothing->subProducts()->firstOrCreate([
            'name' => 'Compression Shirts',
        ], [
            'price' => 25.00,
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
            'name' => 'Leggings',
        ], [
            'price' => 30.00,
            'stock' => 50,
            'parent_id' => $clothing->id,
        ]);

        $clothing->subProducts()->firstOrCreate([
            'name' => 'Tracksuits (Tops, Bottoms)',
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
            'name' => 'Sports Bra',
        ], [
            'price' => 20.00,
            'stock' => 60,
            'parent_id' => $clothing->id,
        ]);

        $clothing->subProducts()->firstOrCreate([
            'name' => 'Football Kit',
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
            'name' => 'Duffle Bags',
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
            'name' => 'Yoga Mats',
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
    }
}
