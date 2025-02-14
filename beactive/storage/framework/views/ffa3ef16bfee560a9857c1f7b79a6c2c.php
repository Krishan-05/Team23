<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('productstyle.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/productstyle.css'); ?>
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
                <li><a href="/">Home</a></li>
                <a href="<?php echo e(route('products')); ?>">Products</a>
                <a href="<?php echo e(route('basket')); ?>">Basket</a>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Select Your Products</h1>
        <div class="main-products">
            <?php $__currentLoopData = $mainProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product">
                <h2><?php echo e($mainProduct->name); ?></h2>
                <p><?php echo e($mainProduct->description); ?></p>
                <button class="show-sub-products" data-id="<?php echo e($mainProduct->id); ?>">View Sub-Products</button>
                <div class="sub-products" id="sub-products-<?php echo e($mainProduct->id); ?>" style="display: none;">
                    <?php $__currentLoopData = $mainProduct->subProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sub-product">
                        <p><?php echo e($subProduct->name); ?> - $<?php echo e($subProduct->price); ?></p>
                        <label for="quantity-<?php echo e($subProduct->id); ?>">Quantity:</label>
                        <input type="number" id="quantity-<?php echo e($subProduct->id); ?>" data-id="<?php echo e($subProduct->id); ?>" data-name="<?php echo e($subProduct->name); ?>" data-price="<?php echo e($subProduct->price); ?>" class="quantity-input" min="1" max="100" value="1">
                        <button class="add-to-basket" data-id="<?php echo e($subProduct->id); ?>">Add to Basket</button>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>


    <script>
        $(document).ready(function () {
            $('.show-sub-products').click(function () {
                const productId = $(this).data('id');
                $(`#sub-products-${productId}`).toggle();
            });
            $('.add-to-basket').click(function () {
                const subProductId = $(this).data('id');
                const quantity = $(`#quantity-${subProductId}`).val();
                const name = $(`#quantity-${subProductId}`).data('name');
                const price = $(`#quantity-${subProductId}`).data('price');

                const basketItems = JSON.parse(localStorage.getItem('basket')) || [];
                basketItems.push({ id: subProductId, name, price, quantity });
                localStorage.setItem('basket', JSON.stringify(basketItems));

                alert(`${quantity} x ${name} added to the basket!`);
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\chris\repos\Team23\beactive\resources\views/product-page.blade.php ENDPATH**/ ?>