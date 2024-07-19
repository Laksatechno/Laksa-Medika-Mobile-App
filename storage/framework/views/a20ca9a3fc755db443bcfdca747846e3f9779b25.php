

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.topNavBack', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    /* Custom CSS for Select2 */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #8e00ad;
        color: white;
    }
</style>
<div class="container">
    <div class="row" style="margin-top: 2cm; margin-bottom: 3cm">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">Tambah Harga Reguler</b>
                </div>
                <div class="card-body">
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('detail')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card">
                            <div class="alert bg-purple" role="alert">
                                <?php echo e($products->title); ?>

                              </div>
                          </div>
                        <input type="hidden" name="product_id" value="<?php echo e($products->id); ?>">
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="price"
                                class="form-control <?php echo e($errors->has('price') ? 'is-invalid':''); ?>" placeholder="Harga">
                            <p class="text-danger"><?php echo e($errors->first('price')); ?></p>
                        </div>
                        <div class="form-group">
                            <?php echo csrf_field(); ?>
                            <label for="">Customer</label>
                            <select class="select1 form-control" id="customer_id" name="customer_id" class="form-control">
                                <option value="">-- Pilih Customer --</option>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?> - <?php echo e($customer->email); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm btn-block">SIMPAN</button>
                        </div>
                    </form>

                    <script>
                        // In your Javascript (external .js resource or <script> tag)
                            $(document).ready(function() {
                            $('#customer_id').select2({
                                language: {
                                    noResults: function() {
                                        return "Data tidak ditemukan";
                                    }
                                }
                            });
                        });
                    </script>
                    
                </div>

                <div class="card">
                    <div class="card-header">
                        <b class="card-title">Tambah Harga Customer</b>
                    </div>
                    <div class="card-body">    
                        <form action="<?php echo e(route('save.detail.customer')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <div class="alert bg-purple" role="alert">
                                    <?php echo e($products->title); ?>

                                  </div>
                              </div>
                            <input type="hidden" name="product_id" value="<?php echo e($products->id); ?>">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="price"
                                    class="form-control <?php echo e($errors->has('price') ? 'is-invalid':''); ?>" placeholder="Harga">
                                <p class="text-danger"><?php echo e($errors->first('price')); ?></p>
                            </div>
                            <div class="form-group">
                                <?php echo csrf_field(); ?>
                                <label for="">Customer</label>
                                <select class="select2 form-control" id="user_id" name="user_id" class="form-control">
                                    <option value="">-- Pilih Customer --</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> - <?php echo e($user->email); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm btn-block">SIMPAN</button>
                            </div>
                        </form>
    
                        <script>
                            // In your Javascript (external .js resource or <script> tag)
                                $(document).ready(function() {
                                    $('#user_id').select2({
                                        language: {
                                            noResults: function() {
                                                return "Data tidak ditemukan";
                                            }
                                        }
                                    });
                                });
                        </script>             
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laragon\Laksa Medika Mobile App\resources\views/products/detail.blade.php ENDPATH**/ ?>